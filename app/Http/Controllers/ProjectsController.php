<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Categories;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::orderBy('id', 'desc')->paginate(10);
        $data = ["projects" => $projects];
        return view('projects.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Projects::all();
        $categories = Categories::getTree();
        $data = ['categories' => $categories, 'projects' => $projects];
        return view('projects.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('projects/create')
                ->withErrors($validator)
                ->withInput();
        }


        $slug = Str::slug($request->get('name'), '_');
        $image = $this->imageStore($request);


        $project = new Projects();
        $project->name = $request->name;
        $project->image = $image;
        $project->slug = $slug;
        $project->category_id = $request->category_id;
        $project->description = $request->description;
        $project->save();

        Session::flash('flash_message', 'Project successfully created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Projects::FindOrFail($id);
        $categories = Categories::all();
        $data = ["projects" => $projects, "categories" => $categories];

        return view('projects.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Projects::FindOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')){
            unlink(public_path().'/assets/img/projects/medium/'.$project->image);
            unlink(public_path().'/assets/img/projects/originals/'.$project->image);
            unlink(public_path().'/assets/img/projects/thumbnails/'.$project->image);

            $input['image'] = $this->imageStore($request);
        }
        $project->fill($input)->save();

        Session::flash('flash_message', 'Project successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::FindOrFail($id);
        $gallery = Gallery::where('project_id', '=', $project->id)->get();

        foreach($gallery as $g)  {
            $g->delete();
        }

        unlink(public_path().'/assets/img/projects/medium/'.$project->image);
        unlink(public_path().'/assets/img/projects/originals/'.$project->image);
        unlink(public_path().'/assets/img/projects/thumbnails/'.$project->image);

        $project->delete();

        Session::flash('flash_message', 'Project successfully deleted!');
        return redirect()->back();
    }

    public function imageStore(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $paths = $this->makePaths();
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->original, $imageName);
            $findimage = $paths->original . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagethumb->save($paths->thumbnail . $imageName);
            $imagemedium->save($paths->medium . $imageName);


            return $imageName;
        }

    }

    public function makePaths()
    {

        $original = public_path() . '/assets/img/projects/originals/';;
        $thumbnail = public_path() . '/assets/img/projects/thumbnails/';
        $medium = public_path() . '/assets/img/projects/medium/';
        $paths = (object)compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
