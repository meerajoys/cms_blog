<?php

namespace App\Http\Controllers;

use permissions;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(){

        return view('admin.roles.index', [

            'roles'=>Role::all()
        ]);

    }

    public function store(Role $roles){

        request()->validate([
            'name'=>['required']
        ]);

        Role::create([

            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function destroy(Role $role){

        $role->delete();

        session()->flash('role-delete', "Role " .$role->name . " is deleted");
        return back();

    }

    public function edit(Role $role){

        return view('admin.roles.edit', [

            'role'=>$role,
            'permissions'=>Permission::all()

        ]);

    }

    public function update(Role $role){

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->Slug('-');

        if($role->isDirty('name')){

            session()->flash('role-update', "Role is updated to " .request('name'));
            $role->save();

        }
        else{

            session()->flash('role-update', 'Nothing has been updated');
        }

        return back();
    }

    public function attach_permission(Role $role, Request $request){

        $role->permissions()->attach(request('permission'));
        // dd($request->all());
        // dd($role->id);
        return back();

    }

    public function detach_permission(Role $role){

        $role->permissions()->detach(request('permission'));
        return back();
    }

}
