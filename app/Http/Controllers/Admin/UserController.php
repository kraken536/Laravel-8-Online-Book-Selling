<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = User::all();
        return view('admin.users_management',['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datalist = User::find($id);
        return view('admin.user_role',['datalist'=> $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        $datalist = User::find($id);
        return view('admin.user_role',['datalist'=> $datalist]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $data = User::find($id);

        return view('admin.user_edit',['data'=> $data,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $data = User::find($id);

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        if($request->hasFile('image')){
            $data->profile_photo_path = Storage::putFile('profile-photos', $request->file('image'));
        }
        
        $data->save();    

        return redirect()->route('admin_users_list')->with('success', 'Account Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'User Account Deleted Successfully.');
    }

    public function user_roles($id){
        $datalist = User::find($id);
        $data = Role::where('id',$id)->get()->sortBy('name');
        $position = Role::orderBy('name')->get();
        // print_r($data);exit();
        return view('admin.user_role',[
            'data'=>$data, 
            'datalist'=>$datalist, 
            'position'=>$position
        ]);
    }

    public function user_role_store(Request $request,User $user, $id){
        $user = User::find($id);
        $role_id = $request->input('role_id');
        $user->roles()->attach($role_id);
        
        return redirect()->back()->with('success', 'Role Added To User.');
    }

    
    public function user_role_delete(Request $request,User $user, $user_id, $role_id){
        $user = User::find($user_id);
        $user->roles()->detach($role_id);

        return redirect()->back()->with('success', 'Role Deleted From User.');
    }

    public function user_info($id){
        $datalist = User::find($id);
        $data = Role::where('id',$id)->get()->sortBy('name');
        $position = Role::orderBy('name')->get();
        // print_r($data);exit();
        return view('admin.user_info',[
            'data'=>$data, 
            'datalist'=>$datalist, 
            'position'=>$position
        ]);
    }
}
