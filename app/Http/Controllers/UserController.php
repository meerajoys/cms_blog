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

        $request->validate([
            'username'=>'required', 'string', 'max:255','alpha_dash',
            'name'=>'required', 'string', 'max:255',
            'email'=>'required', 'email', 'max:255',
            'avatar'=>'image|mimes:jpeg,gif,svg,png|max:2048',
            'password'=>'min:6', 'max:255', 'confirmed'

        ]);

        $user = User::where('id', $id)->first();
        // unlink($user->avatar);

        $image_name =time().'.' . $request->avatar->extension();

        $request->avatar->move(public_path('users'), $image_name);

        // dd($image_name);
        $path = "/users/".$image_name;

        $user->name = $request->name;
        $user->avatar = $path;

        $user->save();
        return back();







        // method 1

        // if ($request->hasFile('avatar')) {

        //     $inputs['avatar'] = $request->avatar->store('avatars', 'public');
        //     $user->avatar = $inputs['avatar'];
        //     // dd($user->avatar);

        // }


        //older method

        // if(request('avatar')){

        //     $inputs['avatar'] = request('avatar')->store('images');
        // }

        // $user->update($inputs);

        // return back();


    }

    // public function edit(User $user, Role $role){

    //     $this->authorize('view', $user);

    //     return view('admin.users.edit',[

    //         'user'=>$user,
    //         'roles'=>Role::all()

    //     ]);
    // }


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
