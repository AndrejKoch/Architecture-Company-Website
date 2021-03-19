<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::orderBy('id', 'desc')->paginate(10);
        $data = ["partners" => $partners];
        return view('partners.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
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
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput();
        }


        $slug = Str::slug($request->get('name'), '_');
        $image = $this->imageStore($request);
        $partners = new Partners();
        $partners->name = $request->name;
        $partners->image = $image;
        $partners->save();

        Session::flash('flash_message', 'Partner successfully created!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = Partners::FindOrFail($id);
        $data = ["partners" => $partners];

        return view('partners.edit')->with($data);
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
        $partners = Partners::FindOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')){
            unlink(public_path().'/assets/img/partners/medium/'.$partners->image);
            unlink(public_path().'/assets/img/partners/originals/'.$partners->image);
            unlink(public_path().'/assets/img/partners/thumbnails/'.$partners->image);
            $input['image'] = $this->imageStore($request);
        }
        $partners->fill($input)->save();

        Session::flash('flash_message', 'Partner successfully updated!');
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
        $partners = Partners::FindOrFail($id);
        unlink(public_path().'/assets/img/partners/medium/'.$partners->image);
        unlink(public_path().'/assets/img/partners/originals/'.$partners->image);
        unlink(public_path().'/assets/img/partners/thumbnails/'.$partners->image);
        $partners->delete();
        Session::flash('flash_message', 'Partner successfully deleted!');
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
        $original = public_path() . '/assets/img/partners/originals/';;
        $thumbnail = public_path() . '/assets/img/partners/thumbnails/';
        $medium = public_path() . '/assets/img/partners/medium/';
        $paths = (object)compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
