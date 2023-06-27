<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserStore;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function create()

    {
        return view('users.create');
    }
    public function show($id)

    {
        User::destroy($id);
        return redirect()->back()->withSuccess('User Created Successfully.');
    }
    public function index()

    {
        $data = User::all();
        return view('users.index',compact('data'));
    }

    public function store(UserStore $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->back()->withSuccess('User Deleted Successfully.');
    }
    public function edit($id)

    {
        $data = User::find($id);
        return view('users.edit',compact('data'));
    }
    public function update(UserStore $request,$id)

    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        User::where('id',$id)->update($input);
        return redirect()->back()->withSuccess('User Updated Successfully.');
    }

}
