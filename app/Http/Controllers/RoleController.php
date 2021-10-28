<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $role)
    {
       //$this->middleware("auth"); - nasa routes na middleware neto
        $this->role = $role;
    }

    public function index()
    {
        $roles= $this->role::all();
        return view('role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'permissions' => 'nullable'
        ]);

        $role = $this->role->create([
            'name' => $request->name
        ]);

        if($request->has("permissions")){
            $role->givePermissionTo($request->permissions);
        }

        return response()->json("Role Created", 200);
    }

    public function getAll(){
        $roles = $this->role->all();
        return response()->json([
            'roles' => $roles
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('role.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required',
            //'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('role.index')
                        ->with('success','Role updated successfully');
       /* $this->validate($request, [
            'name' => 'required|string',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;

        if($request->has('permissions')){
            $rolePermissions = $role->getPermissionNames();
            foreach($rolePermissions as $permssion){
                $role->revokePermissionTo($permssion);
            }

            $role->givePermissionTo($request->permissions);
        }


        $role->save();

        return response()->json('ok',200);*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('role.index')
                        ->with('success','Role deleted successfully');
    }
}
