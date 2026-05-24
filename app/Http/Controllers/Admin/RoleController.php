<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::with('permissions')->select('roles.*');

            return \Yajra\DataTables\Facades\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return '<span class="fw-medium">'.$row->name.'</span>';
                })
                ->editColumn('guard_name', function ($row) {
                    return '<span class="badge bg-label-secondary">'.$row->guard_name.'</span>';
                })
                ->addColumn('permissions_count', function ($row) {
                    return '<span class="badge bg-label-primary">'.$row->permissions->count().' permissions</span>';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-inline-block text-nowrap">';
                    $btn .= '<a href="'.route('admin.roles.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                    if (auth('web')->user()->can('edit-roles')) {
                        $btn .= '<a href="'.route('admin.roles.edit', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>';
                    }
                    if (auth('web')->user()->can('delete-roles')) {
                        $btn .= '<form action="'.route('admin.roles.destroy', $row->id).'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Are you sure?\')">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-sm btn-icon"><i class="bx bx-trash"></i></button>
                                  </form>';
                    }
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['name', 'guard_name', 'permissions_count', 'action'])
                ->make(true);
        }

        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('group')->get()->groupBy(function ($permission) {
            return $permission->group ? $permission->group->name : 'Other';
        });

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'label' => 'nullable|string',
            'description' => 'nullable|string',
            'guard_name' => 'required|string',
        ]);

        $role = Role::create($request->only('name', 'label', 'description', 'guard_name'));

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        flash()->success('Role created successfully.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::with('group')->get()->groupBy(function ($permission) {
            return $permission->group ? $permission->group->name : 'Other';
        });
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'label' => 'nullable|string',
            'description' => 'nullable|string',
            'guard_name' => 'required|string',
        ]);

        $role->update($request->only('name', 'label', 'description', 'guard_name'));

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]);
        }

        flash()->success('Role updated successfully.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        flash()->success('Role deleted successfully.');

        return redirect()->route('admin.roles.index');
    }
}

