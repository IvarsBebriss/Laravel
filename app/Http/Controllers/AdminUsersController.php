<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Post;
use App\User;
use App\Role;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Storage;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all('id', 'name')->sortBy('name');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($file = $request->file('fileToUpload')) {
            $name = $file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $file->move('images',$fileNameToStore);

            $user->photo()->create(['path'=>$fileNameToStore]);

        };

        return redirect('admin\users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all('id', 'name');
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if ($file = $request->file('fileToUpload')) {
            $name = $file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $file->move('images',$fileNameToStore);

            //delete old image and record in photos
            if(count($user->photo)>0){
                unlink(public_path().$user->photo->first()->path);
                $user->photo()->delete();
            }

            $user->photo()->create(['path'=>$fileNameToStore]);

        };

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        if($request->password != '12345678'){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/admin/users')->with('success', 'User '.$user->name.' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect('/admin/users/'.$id.'/edit')->with('error','You can not delete yourself!');
        }

        $user = User::findOrFail($id);

        //delete user photo and photos entry
        if(count($user->photo)>0){
            unlink(public_path().$user->photo->first()->path);
            $user->photo()->delete();
        }

        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted');
    }
}
