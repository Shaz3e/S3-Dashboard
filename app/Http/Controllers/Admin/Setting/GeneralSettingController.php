<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
{
    public function general()
    {
        Gate::authorize('general-setting.read');

        return view('admin.setting.main', [
            'title' => __('setting.title.general'),
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('general-setting.update');

        $validated = $request->validate([
            'app_name' => 'required|string|max:100',
            'app_url' => 'required|url|max:255',
            'app_timezone' => 'required|string|timezone',
            'site_url' => 'required|url|max:255',
            'mail_from_name' => 'required|string|max:100',
            'mail_from_email' => 'required|email|max:255',
            'favicon' => 'nullable|mimes:ico|dimensions:min_width=128,min_height=128,max_width=512,max_height=512',
            'logo_sm' => 'nullable|mimes:png|dimensions:width=24,height=24',
            'logo_light' => 'nullable|mimes:png|dimensions:width=137,height=30',
            'logo_dark' => 'nullable|mimes:png|dimensions:width=137,height=30',
        ]);


        // Check if the favicon exists in the request
        if ($request->hasFile('favicon')) {
            $favicon = DiligentCreators('favicon') ?? null;
            if ($favicon) {
                Storage::disk('public')->delete($favicon);
            }
            $path = $request->file('favicon')->store('logos', 'public');
            $validated['favicon'] = $path;
        }
        // Check if the logo_sm exists in the request
        if ($request->hasFile('logo_sm')) {
            $logo_sm = DiligentCreators('logo_sm') ?? null;
            if ($logo_sm) {
                Storage::disk('public')->delete($logo_sm);
            }
            $path = $request->file('logo_sm')->store('logos', 'public');
            $validated['logo_sm'] = $path;
        }
        // Check if the logo_light exists in the request
        if ($request->hasFile('logo_light')) {
            $logo_light = DiligentCreators('logo_light') ?? null;
            if ($logo_light) {
                Storage::disk('public')->delete($logo_light);
            }
            $path = $request->file('logo_light')->store('logos', 'public');
            $validated['logo_light'] = $path;
        }
        // Check if the logo_dark exists in the request
        if ($request->hasFile('logo_dark')) {
            $logo_dark = DiligentCreators('logo_dark') ?? null;
            if ($logo_dark) {
                Storage::disk('public')->delete($logo_dark);
            }
            $path = $request->file('logo_dark')->store('logos', 'public');
            $validated['logo_dark'] = $path;
        }

        // Loop through each validated field and update or create the settings
        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['name' => $key],
                ['value' => $value]
            );
        }

        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        $envData = [
            'APP_NAME' => "\"{$validated['app_name']}\"",
            'APP_URL' => rtrim($validated['app_url'], '/'),
            'APP_TIMEZONE' => $validated['app_timezone'],
            'MAIL_FROM_ADDRESS' => "\"{$validated['mail_from_email']}\"",
            'MAIL_FROM_NAME' => "\"{$validated['mail_from_name']}\"",
        ];

        // Update the key-value pairs
        foreach ($envData as $key => $value) {
            $envContent = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $envContent);
        }

        File::put($envPath, $envContent);

        flash()->success(__('setting.success.general_saved'));

        return back();
    }
}
