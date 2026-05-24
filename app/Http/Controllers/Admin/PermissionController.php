<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::with('group')->select('permissions.*');
            return \Yajra\DataTables\Facades\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function($row) {
                    return '<span class="fw-medium">'.$row->name.'</span>';
                })
                ->addColumn('group', function($row) {
                    return $row->group->name ?? 'None';
                })
                ->editColumn('guard_name', function($row) {
                    return '<span class="badge bg-label-secondary">'.$row->guard_name.'</span>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-inline-block text-nowrap">';
                    $btn .= '<a href="'.route('admin.permissions.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                    if (auth('web')->user()->can('edit-permissions')) {
                        $btn .= '<a href="'.route('admin.permissions.edit', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>';
                    }
                    if (auth('web')->user()->can('delete-permissions')) {
                        $btn .= '<form action="'.route('admin.permissions.destroy', $row->id).'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Are you sure?\')">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>
                                  </form>';
                    }
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['name', 'guard_name', 'action'])
                ->make(true);
        }

        return view('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = PermissionGroup::all();

        return view('admin.permissions.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'module' => 'required|string',
            'guard_name' => 'required|string',
            'group_id' => 'nullable|exists:permission_groups,id',
            'label' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Permission::create($request->all());

        flash()->success('Permission created successfully.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $groups = PermissionGroup::all();

        return view('admin.permissions.edit', compact('permission', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$permission->id,
            'module' => 'required|string',
            'guard_name' => 'required|string',
            'group_id' => 'nullable|exists:permission_groups,id',
            'label' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permission->update($request->all());

        flash()->success('Permission updated successfully.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        flash()->success('Permission deleted successfully.');

        return redirect()->route('admin.permissions.index');
    }
}

