<?php

namespace App\Http\Controllers;

use App\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = Counter::all();
        $data = ["counter" => $counter];
        return view('counter.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counter.create');
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
            'number' => 'required|numeric',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('counter/create')
                ->withErrors($validator)
                ->withInput();
        }

        $counter = new Counter();
        $counter->name = $request->name;
        $counter->icon = $request->icon;
        $counter->number = $request->number;
        $counter->save();

        Session::flash('flash_message', 'Counter successfully created!');
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
        $counter = counter::FindOrFail($id);
        $data = ["counter" => $counter];

        return view('counter.edit')->with($data);
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
        $counter = Counter::FindOrFail($id);
        $input = $request->all();
        $counter->fill($input)->save();

        Session::flash('flash_message', 'Counter successfully updated!');
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
        $counter = Counter::FindOrFail($id);

        $counter->delete();

        Session::flash('flash_message', 'Counter successfully deleted!');
        return redirect()->back();
    }
}
