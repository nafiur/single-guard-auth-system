<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PermissionGroup::select('permission_groups.*');
            return \Yajra\DataTables\Facades\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function($row) {
                    return '<span class="fw-medium">'.$row->name.'</span>';
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-inline-block text-nowrap">';
                    $btn .= '<a href="'.route('admin.permission-groups.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                    if (auth('web')->user()->can('edit-permission-groups')) {
                        $btn .= '<a href="'.route('admin.permission-groups.edit', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>';
                    }
                    if (auth('web')->user()->can('delete-permission-groups')) {
                        $btn .= '<form action="'.route('admin.permission-groups.destroy', $row->id).'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Are you sure?\')">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>
                                  </form>';
                    }
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['name', 'action'])
                ->make(true);
        }

        return view('admin.permission-groups.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permission_groups,name',
            'label' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        PermissionGroup::create($request->all());

        flash()->success('Group created successfully.');

        return redirect()->route('admin.permission-groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionGroup $permissionGroup)
    {
        return view('admin.permission-groups.show', compact('permissionGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionGroup $permissionGroup)
    {
        return view('admin.permission-groups.edit', compact('permissionGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermissionGroup $permissionGroup)
    {
        $request->validate([
            'name' => 'required|unique:permission_groups,name,'.$permissionGroup->id,
            'label' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $permissionGroup->update($request->all());

        flash()->success('Group updated successfully.');

        return redirect()->route('admin.permission-groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermissionGroup $permissionGroup)
    {
        $permissionGroup->delete();

        flash()->success('Group deleted successfully.');

        return redirect()->route('admin.permission-groups.index');
    }
}

