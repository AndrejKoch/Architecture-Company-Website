<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ["users" =>  User::all()];
        return view('user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $data = ["roles" => $roles];
        return view('user.create')->with($data);
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
            'role_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            're_password' => 'required|min:8|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('user/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name'      => $request->get('name'),
            'role_id'   => $request->get('role_id'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
        ]);

        Session::flash('flash_message', 'User successfully created!');
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
        $user = User::FindOrFail($id);
        $roles = Role::all();
        $data = ["user" => $user, "roles" => $roles];
        return view('user.edit')->with($data);
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
        $input = $request->all();
        unset($input['password']);
        $user = User::FindOrFail($id);
        $user->fill($input)->save();

        Session::flash('flash_message', 'User successfully edited!');
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
        $user = User::FindOrFail($id);
        $user->delete();

        Session::flash('flash_message', 'User successfully deleted!');
        return redirect()->back();
    }
}
