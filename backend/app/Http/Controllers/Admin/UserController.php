<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    protected $users;
    public function __construct(User $user)
    {
        $this->users = $user;
    }
    public function index()
    {
        // abort_if(Gate::denies("user_access"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $users = $this->users->all();
        return view('admin.users.index',compact('users'));
    }
    // public function create()
    // {
    //     // abort_if(Gate::denies("user_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $roles = $this->roles->pluck('title','id');
    //     return view('admin.users.create',compact(['roles']));
    // }
    // public function store(Request $request)
    // {
    //     // abort_if(Gate::denies("user_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $user = $this->users->create($request->all());
    //     $user->roles()->sync($request->input('roles', []));
    //     return redirect()->route('admin.users.index')->with('message' , 'User Create Success!');
    // }
    // public function show($id)
    // {
    //     // abort_if(Gate::denies("user_show"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $user = $this->users->with('roles')->findOrFail($id);
    //     return view('admin.users.show',compact('user'));
    // }
    // public function edit($id)
    // {
    //     // abort_if(Gate::denies("user_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $roles = $this->roles->all();
    //     $user = $this->users->with('roles')->findOrFail($id);
    //     return view('admin.users.edit',compact(['user','roles']));
    // }
    // public function update(UpdateUserRequest $request, $id)
    // {
    //     // abort_if(Gate::denies("user_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $user = $this->users->findOrFail($id);
    //     $user->update($request->all());
    //     $user->roles()->sync($request->input('roles', []));

    //     return redirect()->route('admin.users.index')->with('message' ,'User Update Successfuly!');
    // }
    // public function destroy($id)
    // {
    //     // abort_if(Gate::denies("user_delete"), Response::HTTP_FORBIDDEN,"403 Forbidden");
    //     $user = $this->users->findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('admin.users.index')->with('message' ,'User Delete Successfuly!');
    // }
    
    
}

