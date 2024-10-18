<?php

namespace App\Http\Controllers\Admin\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function __invoke()
    {
        Gate::authorize('viewAny', Permission::class);

        return view('admin.permissions.index', [
            'title' => __('permission.title.index')
        ]);
    }
}
