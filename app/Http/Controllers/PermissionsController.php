<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $permissions = Permission::all();
        // return view('admin.roles.create',compact('permissions'));
        return view('admin.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
    
        ]);        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();   
        }
        $permission = Permission::create($request->all());
        return redirect()->route('admin.permissions.edit',$permission)->with('info','Permiso creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('admin.roles.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Permission $permission)
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('admin.permissions.edit',compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->route('admin.permissions.edit',$permission)->with('info','Permiso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index',$permission)->with('info','Permiso eliminado exitosamente');

    }
}
