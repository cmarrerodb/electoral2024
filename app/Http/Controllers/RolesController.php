<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Permission\Contracts\Permission;
use App\Models\User;
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
        $permissions = Permission::all();
        $rol_id = $role->id;
        $permisos=DB::table('role_has_permissions')->where('role_id','=',$rol_id)->get()->toArray();
        return view('admin.roles.edit',compact('role','permissions','permisos'));
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permissions' => 'array|min:1',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $permissionsArray = [];
        foreach ($request->permissions as $key => $value) {
            $permissionsArray = array_merge($permissionsArray, array_flip([$key => $key]));
        }
        $permissionsList = array_values($permissionsArray);
        $role = Role::find($role->id);
        $role->update($request->all());
        $role->permissions()->sync($permissionsList);
    
        return redirect()->route('admin.roles.edit',$role)->with('info','Rol creado exitosamente');
    }    
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index',$role)->with('info','Rol eliminado exitosamente');
    }
    // public function assign($id) {
    //     $roles = Role::all();
    //     return view('admin.roles.assign',compact('id','roles'));
    // }
    // public function assign($id)
    // {
    //     $role = Role::findOrFail($id);
    //     $name = $role->name;
    //     $users = User::with('roles');
    //     // $users = User::with('roles')->paginate(10);
    //     // $roles = [];   
    //     // foreach ($users as $user) {
    //     //     $assigned = $user->roles->contains($role);
    //     //     $roles[] = [
    //     //         'id' => $user->id,
    //     //         'name' => $user->name,
    //     //         'email' => $user->email,
    //     //         'assigned' => $assigned,
    //     //     ];
    //     // }
    //     $roles = $users->paginate(10);
    //     foreach ($roles as $role) {
    //         $assigned = $role->users->contains($user);
    //         $roles[] = [
    //             'id' => $role->id,
    //             'name' => $role->name,
    //             'email' => $role->email,
    //             'assigned' => $assigned,
    //         ];
    //     }        
    //     return view('admin.roles.assign', compact('name','roles'));
    // }
    // public function assign($id)
    // {
    //     $role = Role::findOrFail($id);
    //     $name = $role->name;
    //     $users = User::with('roles')->paginate(10);
    //     $roles = [];
    
    //     foreach ($users as $user) {
    //         $assigned = $user->roles->contains($role);
    //         $roles[] = [
    //             'id' => $user->id,
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'assigned' => $assigned,
    //         ];
    //     }
    
    //     return view('admin.roles.assign', compact('name', 'roles','users'));
    // }    
    public function assign($id)
    {
        $role = Role::findOrFail($id);
        $name = $role->name;
        $users = User::with('roles')->paginate(10);
        $roles = [];
        foreach ($users as $user) {
            $assigned = $user->roles->contains($role);
            $roles[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'assigned' => $assigned,
                'role' => $role,
            ];
        }
        return view('admin.roles.assign', compact('id','name', 'roles','users'));
    }    
        public function role2user(Request $request) {
        // Get the user instance
        $user = User::find(1);       
        // Get the role instance
        $role = Role::findByName('editor');
        // Assign the role to the user
        $user->syncRoles([$role]);
    }
}
