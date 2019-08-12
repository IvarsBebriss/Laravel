<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Post;
use App\User;
use App\Role;
//use Illuminate\Http\File;
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
        $error = $request->validate([
            'email' => 'unique:users'
        ]);
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

            $user->photos()->create(['path'=>$fileNameToStore]);

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
        //$path = $user->photos->count()>0 ? $user->photos()->first()->path : NULL;

        if ($file = $request->file('fileToUpload')) {
            $name = $file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $file->move('images',$fileNameToStore);

            $path = $user->photos->count()>0 ? $user->photos()->first()->path : NULL;
            $path = ltrim($path, '/');

            if(File::exists($path)){
                File::delete($path);
            };

            $user->photos()->delete();
            $user->photos()->create(['path'=>$fileNameToStore]);

        };

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/admin/users')->with('success', 'User '.$user->name.' updated'.$path);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
