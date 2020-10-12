<?php

namespace App\Http\Controllers;

use App\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $static_page = StaticPage::all();
        $data = ["static_page" => $static_page];
        return view('static_page.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('static_page.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('static_page/create')
                ->withErrors($validator)
                ->withInput();
        }


        $description = $request->description;
        $slug = Str::slug($request->get('title'), '-');
        $image = $this->imageStore($request);

        $static_page = new StaticPage();
        $static_page->title = $request->title;
        $static_page->description = $description;
        $static_page->image = $image;
        $static_page->slug = $slug;
        $static_page->link = $request->link;
        $static_page->icon = $request->icon;
        $static_page->save();

        Session::flash('flash_message', 'Page successfully created!');
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
        $static_page = StaticPage::FindOrFail($id);
        $data = ["static_page" => $static_page];

        return view('static_page.edit')->with($data);
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
        $static_page = StaticPage::FindOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')){
            unlink(public_path().'/assets/img/static_page/medium/'.$static_page->image);
            unlink(public_path().'/assets/img/static_page/originals/'.$static_page->image);
            unlink(public_path().'/assets/img/static_page/thumbnails/'.$static_page->image);

            $input['image'] = $this->imageStore($request);
        }
        $static_page->fill($input)->save();

        Session::flash('flash_message', 'Page successfully updated!');
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
        $static_page = StaticPage::FindOrFail($id);



        unlink(public_path().'/assets/img/static_page/medium/'.$static_page->image);
        unlink(public_path().'/assets/img/static_page/originals/'.$static_page->image);
        unlink(public_path().'/assets/img/static_page/thumbnails/'.$static_page->image);
        $static_page->delete();

        Session::flash('flash_message', 'Page successfully deleted!');
        return redirect()->back();    }


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

        $original = public_path() . '/assets/img/static_page/originals/';;
        $thumbnail = public_path() . '/assets/img/static_page/thumbnails/';
        $medium = public_path() . '/assets/img/static_page/medium/';
        $paths = (object)compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
