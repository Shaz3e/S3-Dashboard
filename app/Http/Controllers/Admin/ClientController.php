<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        return view('admin.clients.index', [
            'title' => __('client.title.index')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        return view('admin.clients.create', [
            'title' => __('client.title.create')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Gate::authorize('create', User::class);

        $validated = $request->validated();

        $user = User::create($validated);

        // Create admin
        $user->user_type = false;

        // If email verification not required
        if ($request->email_verified_at == true) {
            $user->email_verified_at = now();
        }
        $user->save();

        flash()->success(__('client.success.created'));

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $client)
    {
        Gate::authorize('view', $client);

        if ($request->has('email_verified')) {
            if ($request->email_verified == 1) {
                $client->markEmailAsVerified();
            } elseif ($request->email_verified == 0) {
                $client->email_verified_at = null;
                $client->save();
            }
            return back();
        }
        if ($request->has('active')) {
            if ($request->active == 1) {
                $client->active = true;
            } elseif ($request->active == 0) {
                $client->active = false;
            }
            $client->save();
            return back();
        }

        return view('admin.clients.show', [
            'title' => __('client.title.show'),
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        Gate::authorize('update', $client);

        return view('admin.clients.edit', [
            'title' => __('client.title.edit'),
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreClientRequest $request, User $client)
    {
        Gate::authorize('update', $client);

        $validated = $request->validated();

        if ($request->password == null) {
            unset($validated['password']);
        }

        $client->update($validated);

        // If email verification not required
        if ($request->email_verified_at == true) {
            $client->email_verified_at = now();
            $client->save();
        }

        flash()->success(__('client.success.updated'));

        return redirect()->route('admin.clients.index');
    }
}
