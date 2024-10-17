<?php

namespace App\Http\Controllers\Admin\RolePermission;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __invoke()
    {
        return view('admin.permission.index', [
            'title' => __('permission.title.index')
        ]);
    }
}
