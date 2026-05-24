<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->select('users.*');

            return \Yajra\DataTables\Facades\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    $initial = substr($row->name, 0, 1);
                    $badgeType = $row->user_type === 'vendor' ? 'warning' : 'info';

                    return '
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-'.$badgeType.'">'.$initial.'</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fw-medium text-body">'.$row->name.'</span>
                                <small class="text-muted">'.$row->email.'</small>
                            </div>
                        </div>';
                })
                ->editColumn('user_type', function ($row) {
                    $class = $row->user_type === 'vendor' ? 'warning' : 'success';

                    return '<span class="badge bg-label-'.$class.'">'.ucfirst($row->user_type).'</span>';
                })
                ->addColumn('roles', function ($row) {
                    $roles = '';
                    foreach ($row->roles as $role) {
                        $roles .= '<span class="badge bg-label-primary me-1">'.$role->name.'</span>';
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
                    $btn .= '<a href="'.route('admin.users.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                    if (auth('web')->user()->can('edit-users')) {
                        $btn .= '<a href="'.route('admin.users.edit', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>';
                    }
                    if (auth('web')->user()->can('delete-users')) {
                        $btn .= '<form action="'.route('admin.users.destroy', $row->id).'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Are you sure?\')">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-sm btn-icon"><i class="bx bx-trash"></i></button>
                                  </form>';
                    }
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['name', 'user_type', 'roles', 'status', 'action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->get();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string', 'in:user,vendor'],
            'roles' => ['nullable', 'array'],
            'status' => ['required', 'string', 'in:active,inactive,banned'],
            'ban_reason' => ['nullable', 'string', 'required_if:status,banned'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'status' => $request->status,
            'ban_reason' => $request->status === 'banned' ? $request->ban_reason : null,
            'last_password_change_at' => now(),
        ]);

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        flash()->success('User created successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::where('guard_name', 'web')->get();
        $userRoles = $user->roles->pluck('name')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string', 'in:user,vendor'],
            'roles' => ['nullable', 'array'],
            'status' => ['required', 'string', 'in:active,inactive,banned'],
            'ban_reason' => ['nullable', 'string', 'required_if:status,banned'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->status = $request->status;
        $user->ban_reason = $request->status === 'banned' ? $request->ban_reason : null;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->last_password_change_at = now();
        }

        $user->save();

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        flash()->success('User updated successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash()->success('User deleted successfully.');

        return redirect()->route('admin.users.index');
    }
}

