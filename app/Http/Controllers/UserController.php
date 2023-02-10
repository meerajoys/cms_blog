<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    public function index(){

        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }


    public function show(User $user){

        return view('admin.users.profile', [

            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function update(Request $request, $id){



        // dd($request->avatar);

       $request->validate([
            'username'=>'required', 'string', 'max:255','alpha_dash',
            'name'=>'required', 'string', 'max:255',
            'email'=>'required', 'email', 'max:255',
            'avatar'=>'image|mimes:jpeg,gif,svg,png|max:2048',
            // 'password'=>'min:6', 'max:255', 'confirmed'

        ]);


        $user = User::where('id', $id)->first();

        // dd($request->avatar);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('avatar')){

            $image_name =time().'.' . $request->avatar->extension();


            $request->avatar->move(public_path('users'), $image_name);
            $path = "/users/".$image_name;

            $user->avatar = $path;
        }


        $user->save();
        return back();

    }



    public function destroy(User $user){

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }

    public function attach(User $user){

        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));
        return back();
    }
}


