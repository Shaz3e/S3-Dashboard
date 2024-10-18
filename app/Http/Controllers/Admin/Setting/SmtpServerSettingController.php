<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSmtpServerRequest;
use App\Models\SmtpServer;
use Illuminate\Support\Facades\Gate;

class SmtpServerSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', SmtpServer::class);

        return view('admin.setting.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', SmtpServer::class);

        return view('admin.setting.main', [
            'title' => __('smtp-server.title.create'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSmtpServerRequest $request)
    {
        Gate::authorize('create', SmtpServer::class);

        $validated = $request->validated();

        $smtpServer = SmtpServer::create($validated);

        flash()->success(__('smtp-server.success.created'));

        return redirect()->route('admin.smtp-servers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SmtpServer $smtpServer)
    {
        Gate::authorize('view', SmtpServer::class);

        if ($smtpServer) {
            return redirect()->route('admin.smtp-servers.edit', $smtpServer->id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmtpServer $smtpServer)
    {
        Gate::authorize('update', SmtpServer::class);

        return view('admin.setting.main', [
            'title' => __('smtp-server.title.edit'),
            'smtpServer' => $smtpServer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSmtpServerRequest $request, SmtpServer $smtpServer)
    {
        Gate::authorize('update', SmtpServer::class);

        $validated = $request->validated();

        $smtpServer->update($validated);

        flash()->success(__('smtp-server.succes.updated'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmtpServer $smtpServer)
    {
        Gate::authorize('delete', SmtpServer::class);
    }
}
