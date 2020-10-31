<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Projects;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        $projects = Projects::all();
        $services = Services::all();
        $data = ["gallery" => $gallery, 'projects' => $projects, 'services' => $services];
        return view('gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = Gallery::all();
        $projects = Projects::all();
        $services = Services::all();
        $data = ["gallery" => $gallery, 'projects' => $projects, 'services' => $services];
        return view('gallery.create')->with($data);
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
        ]);

        if ($validator->fails()) {
            return redirect('gallery/create')
                ->withErrors($validator)
                ->withInput();
        }


        $image = $this->imageStore($request);

        $gallery = new Gallery();
        $gallery->name = $request->name;
        $gallery->image = $image;
        $gallery->project_id = $request->project_id;
        $gallery->service_id = $request->service_id;
        $gallery->save();

        Session::flash('flash_message', 'Gallery image successfully created!');
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
        $gallery = Gallery::FindOrFail($id);
        $projects = Projects::all();
        $services = Services::all();
        $data = ["gallery" => $gallery, 'projects' => $projects, 'services' => $services];
        return view('gallery.edit')->with($data);
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
        $gallery = Gallery::FindOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')){
            unlink(public_path().'/assets/img/gallery/medium/'.$gallery->image);
            unlink(public_path().'/assets/img/gallery/originals/'.$gallery->image);
            unlink(public_path().'/assets/img/gallery/thumbnails/'.$gallery->image);
            $input['image'] = $this->imageStore($request);
        }
        $gallery->fill($input)->save();

        Session::flash('flash_message', 'Gallery image successfully updated!');
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
        $gallery = Gallery::FindOrFail($id);



        unlink(public_path().'/assets/img/gallery/medium/'.$gallery->image);
        unlink(public_path().'/assets/img/gallery/originals/'.$gallery->image);
        unlink(public_path().'/assets/img/gallery/thumbnails/'.$gallery->image);
        $gallery->delete();

        Session::flash('flash_message', 'Gallery image successfully deleted!');
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

        $original = public_path() . '/assets/img/gallery/originals/';;
        $thumbnail = public_path() . '/assets/img/gallery/thumbnails/';
        $medium = public_path() . '/assets/img/gallery/medium/';
        $paths = (object)compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
