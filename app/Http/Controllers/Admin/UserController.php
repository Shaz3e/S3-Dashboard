<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        return view('admin.users.index', [
            'title' => __('user.title.index')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        return view('admin.users.create', [
            'title' => __('user.title.create')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create', User::class);

        $validated = $request->validated();

        $user = User::create($validated);

        // Create admin
        $user->user_type = true;

        // If email verification not required
        if ($request->email_verified_at == true) {
            $user->email_verified_at = now();
        }
        $user->save();

        flash()->success(__('user.success.created'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        Gate::authorize('view', $user);

        if ($request->has('email_verified')) {
            if ($request->email_verified == 1) {
                $user->markEmailAsVerified();
            } elseif ($request->email_verified == 0) {
                $user->email_verified_at = null;
                $user->save();
            }
            return back();
        }
        if ($request->has('active')) {
            if ($request->active == 1) {
                $user->active = true;
            } elseif ($request->active == 0) {
                $user->active = false;
            }
            $user->save();
            return back();
        }

        return view('admin.users.show', [
            'title' => __('user.title.show'),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('admin.users.edit', [
            'title' => __('user.title.edit'),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, User $user)
    {
        Gate::authorize('update', $user);

        $validated = $request->validated();

        if ($request->password == null) {
            unset($validated['password']);
        }

        $user->update($validated);

        // If email verification not required
        if ($request->email_verified_at == true) {
            $user->email_verified_at = now();
            $user->save();
        }

        flash()->success(__('user.success.updated'));

        return redirect()->route('admin.users.index');
    }
}
