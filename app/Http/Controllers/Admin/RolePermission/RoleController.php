<?php

namespace App\Http\Controllers\Admin\RolePermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolePermission\StoreRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Role::class);

        return view('admin.roles.index', [
            'title' => __('role.title.index')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Role::class);

        return view('admin.roles.create', [
            'title' => __('role.title.create'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('create', Role::class);

        $validated = $request->validated();

        Role::create($validated);

        flash()->success(__('role.success.created'));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        Gate::authorize('view', $role);

        if ($role) {
            return redirect()->route('admin.roles.edit', $role->id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('update', $role);

        $permissions = Permission::all();

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', [
            'title' => __('role.title.edit'),
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        Gate::authorize('update', $role);

        if ($request->has('syncPermissions')) {
            if ($role) {
                $role->syncPermissions($request->permissions);
                flash()->success(__('role.success.permission_updated'));
                return back();
            }
        }

        $validated = $request->validated();

        $role->update($validated);

        flash()->success(__('role.success.created'));

        return redirect()->route('admin.roles.index');
    }
}
