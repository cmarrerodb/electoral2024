<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class RolesController extends Controller
{
    public function __construct() {
        // $this->middleware('can')->only('admin.roles.index')->only('index');
        // $this->middleware('can')->only('admin.roles.edit')->only('edit','update');
        // $this->middleware('can')->only('admin.roles.create')->only('create','store');
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permissions' => 'array|min:1',
    
        ]);        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();   
        }
        // $request->merge(['permissions' => array_map(function ($permission) {
        //     return $permission === 'on' ? 1 : $permission;
        // }, $request->permissions)]);

        // $requestPermissions = $request->permissions; // Assuming this contains the array with key-value pairs
        // $permissionsArray = array_flip($requestPermissions); // This will flip the keys and values of the array
        // $permissionsList = array_values($permissionsArray); // This will convert the array to the desired format

        $permissionsArray = [];
        foreach ($request->permissions as $key => $value) {
            $permissionsArray = array_merge($permissionsArray, array_flip([$key => $key]));
        }
        $permissionsList = array_values($permissionsArray);
        $role = Role::create($request->all());
        $role->syncPermissions($permissionsList);
        return redirect()->route('admin.roles.edit',$role)->with('info','Rol creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Request $request, Role $role)
    public function edit(Role $role)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'permissions' => 'array|min:1',
    
        // ]);        
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();   
        // }
        // info($request->all());
        // $request->merge(['permissions' => array_map(function ($permission) {
        //     return $permission === 'on' ? 1 : $permission;
        // }, $request->permissions)]);        
        // info($request->all());
        $permissions = Permission::all();
        $rol_id = $role->id;
        $permisos=DB::table('role_has_permissions')->where('role_id','=',$rol_id)->get()->toArray();
        return view('admin.roles.edit',compact('role','permissions','permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
