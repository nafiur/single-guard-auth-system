<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->where('user_type', 'admin')->select('users.*');

            return \Yajra\DataTables\Facades\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    $initial = substr($row->name, 0, 1);
                    $badge = $row->id === auth('web')->id() ? '<small class="text-primary">(You)</small>' : '';

                    return '
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-primary">'.$initial.'</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fw-medium">'.$row->name.'</span>
                                '.$badge.'
                            </div>
                        </div>';
                })
                ->addColumn('roles', function ($row) {
                    $roles = '';
                    foreach ($row->roles as $role) {
                        $roles .= '<span class="badge bg-label-info me-1">'.$role->name.'</span>';
                    }

                    return $roles;
                })
                ->editColumn('status', function ($row) {
                    $class = $row->status->value === 'active' ? 'success' : ($row->status->value === 'inactive' ? 'warning' : 'danger');

                    return '<span class="badge bg-label-'.$class.'">'.$row->status->label().'</span>';
                })
                ->editColumn('last_login_at', function ($row) {
                    return $row->last_login_at ? $row->last_login_at->diffForHumans() : 'Never';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-inline-block text-nowrap">';
                    $btn .= '<a href="'.route('admin.administrators.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                    if (auth('web')->user()->can('edit-administrators')) {
                        $btn .= '<a href="'.route('admin.administrators.edit', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>';
                    }
                    if ($row->id !== auth('web')->id()) {
                        if (auth('web')->user()->can('delete-administrators')) {
                            $btn .= '<form action="'.route('admin.administrators.destroy', $row->id).'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Are you sure?\')">
                                        '.csrf_field().'
                                        '.method_field('DELETE').'
                                        <button type="submit" class="btn btn-sm btn-icon"><i class="bx bx-trash"></i></button>
                                      </form>';
                        }
                    }
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['name', 'roles', 'status', 'action'])
                ->make(true);
        }

        return view('admin.administrators.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->get();

        return view('admin.administrators.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['nullable', 'array'],
            'status' => ['required', 'string', 'in:active,inactive,banned'],
            'ban_reason' => ['nullable', 'string', 'required_if:status,banned'],
        ]);

        $admin = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'user_type' => 'admin',
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'ban_reason' => $request->status === 'banned' ? $request->ban_reason : null,
            'last_password_change_at' => now(),
        ]);

        if ($request->has('roles')) {
            $admin->assignRole($request->roles);
        }

        flash()->success('Administrator created successfully.');

        return redirect()->route('admin.administrators.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $administrator)
    {
        abort_unless($administrator->user_type === 'admin', 404);

        return view('admin.administrators.show', compact('administrator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $administrator)
    {
        abort_unless($administrator->user_type === 'admin', 404);

        $roles = Role::where('guard_name', 'web')->get();
        $adminRoles = $administrator->roles->pluck('name')->toArray();

        return view('admin.administrators.edit', compact('administrator', 'roles', 'adminRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $administrator)
    {
        abort_unless($administrator->user_type === 'admin', 404);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$administrator->id],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$administrator->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'roles' => ['nullable', 'array'],
            'status' => ['required', 'string', 'in:active,inactive,banned'],
            'ban_reason' => ['nullable', 'string', 'required_if:status,banned'],
        ]);

        $administrator->name = $request->name;
        $administrator->username = $request->username;
        $administrator->email = $request->email;
        $administrator->status = $request->status;
        $administrator->ban_reason = $request->status === 'banned' ? $request->ban_reason : null;

        if ($request->filled('password')) {
            $administrator->password = Hash::make($request->password);
            $administrator->last_password_change_at = now();
        }

        $administrator->save();

        if ($request->has('roles')) {
            $administrator->syncRoles($request->roles);
        } else {
            $administrator->syncRoles([]);
        }

        flash()->success('Administrator updated successfully.');

        return redirect()->route('admin.administrators.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $administrator)
    {
        abort_unless($administrator->user_type === 'admin', 404);

        if ($administrator->id === auth('web')->id()) {
            flash()->error('You cannot delete yourself.');

            return back();
        }

        $administrator->delete();

        flash()->success('Administrator deleted successfully.');

        return redirect()->route('admin.administrators.index');
    }
}

