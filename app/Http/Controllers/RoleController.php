<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

        return view('admin.roles.edit', ['role'=>$role]);

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


}
