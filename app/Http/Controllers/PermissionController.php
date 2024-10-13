<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $permissions = Permission::latest();
        $q = $request->query('q');
        if(isset($q) && !empty($q))
            $permissions->Where('name','like','%'.$q.'%');
        $permissions = $permissions->paginate(10);
        return view('admin.permission.index',compact('permissions'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Please enter permission name'
        ]);
        $newId = Permission::create($request->all());
        return redirect()->route('permission.index')->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Please enter permission name'
        ]);
        $updateId = Permission::find($id)->update($request->all());
        return redirect()->route('permission.index')->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteRecord = Permission::find($id)->delete();
        return redirect()->route('permission.index')->with('success','Permission deleted successfully');
    }
}
