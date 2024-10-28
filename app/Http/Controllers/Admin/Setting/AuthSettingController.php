<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthSettingController extends Controller
{
    public function authSetting()
    {
        Gate::authorize('auth-setting.read');

        return view('admin.setting.main', [
            'title' => __('setting.title.auth'),
        ]);
    }

    public function authSettingStore(Request $request)
    {
        Gate::authorize('auth-setting.update');

        if($request->has('active')){
            $this->activateAccount($request);
        }

        return back();
    }

    private function activateAccount(Request $request)
    {
        $validated = $request->validate([
            'active' => 'required|boolean'
        ]);

        // Loop through each validated field and update or create the settings
        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['name' => $key],
                ['value' => $value]
            );
        }

        flash()->success(__('setting.success.auth_setting_saved'));
    }
}
