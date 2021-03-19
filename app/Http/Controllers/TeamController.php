<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        $data = ["team" => $team];
        return view('team.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
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
            return redirect('team/create')
                ->withErrors($validator)
                ->withInput();
        }
        $image = $this->imageStore($request);

        $team = new Team();
        $team->name = $request->name;
        $team->description = $request->description;
        $team->role = $request->role;
        $team->image = $image;
        $team->save();

        Session::flash('flash_message', 'Team member successfully created!');
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
        $team = Team::FindOrFail($id);
        $data = ["team" => $team];

        return view('team.edit')->with($data);
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
        $team = Team::FindOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image')) {
            unlink(public_path().'/assets/img/team/medium/'.$team->image);
            unlink(public_path().'/assets/img/team/originals/'.$team->image);
            unlink(public_path().'/assets/img/team/thumbnails/'.$team->image);
            $input['image'] = $this->imageStore($request);
        }
        $team->fill($input)->save();

        Session::flash('flash_message', 'Team member successfully updated!');
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
        $team = Team::FindOrFail($id);
        unlink(public_path().'/assets/img/team/medium/'.$team->image);
        unlink(public_path().'/assets/img/team/originals/'.$team->image);
        unlink(public_path().'/assets/img/team/thumbnails/'.$team->image);
        $team->delete();

        Session::flash('flash_message', 'Team member successfully deleted!');
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
        $original = public_path() . '/assets/img/team/originals/';;
        $thumbnail = public_path() . '/assets/img/team/thumbnails/';
        $medium = public_path() . '/assets/img/team/medium/';
        $paths = (object)compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
