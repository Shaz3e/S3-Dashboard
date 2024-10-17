<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
{
    public function general()
    {
        return view('admin.setting.main');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required',
            'app_url' => 'required|url',
            'app_timezone' => 'required|string',
            'site_url' => 'required|url',
            'favicon' => 'nullable',
            'logo_sm' => 'nullable',
            'logo_light' => 'nullable',
            'logo_dark' => 'nullable',
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
