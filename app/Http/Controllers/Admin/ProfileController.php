<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        // Automatically create a profile if none exists
        $user->profile()->firstOrCreate([
            'user_id' => $user->id
        ]);

        return view('admin.profile.profile', [
            'title' => __('profile.title.profile'),
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->has('profile')) {
            return $this->updateProfile($request);
        }

        if ($request->has('changePassword')) {
            return $this->changePassword($request);
        }

        if ($request->has('changeAvatar')) {
            return $this->changeAvatar($request);
        }

        if ($request->has('additionalInformation')) {
            return $this->additionalInformation(app(StoreProfileRequest::class));
        }

        if ($request->has('deleteMyAccount')) {
            return $this->deleteMyAccount($request);
        }
    }

    // Update Profile
    private function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
        ]);

        $user = auth()->user();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        flash()->success(__('profile.success.profile_updated'));
        return back();
    }

    // Change password
    private function changePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|max:65',
            'confirm_password' => 'required|same:password'
        ]);

        // Get current user
        $user = auth()->user();

        // If current password is incorrect
        if (!password_verify($validated['current_password'], $user->password)) {
            flash()->error(__('profile.error.current_password_incorrect'));
            return back();
        }
        // If new password is same as old password
        if (password_verify($validated['password'], $user->password)) {
            flash()->error(__('profile.error.new_password_same_as_old'));
            return back();
        }

        $user->password = $validated['password'];
        $user->save();

        flash()->success(__('profile.success.password_changed'));
        return back();
    }

    // Change avatar
    private function changeAvatar(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:png,jpg|max:2048',
            'selected_avatar' => 'nullable|string'
        ]);

        $user = auth()->user();
        $oldAvatar = $user->profile->avatar ?? null;  // Store the old avatar path
        // Check if a new avatar file has been uploaded
        if ($request->hasFile('avatar')) {
            // Delete the old avatar from storage if it exists and is not a predefined avatar
            if ($oldAvatar && !str_contains($oldAvatar, 'avatars/avatar')) {
                Storage::disk('public')->delete($oldAvatar);
            }

            // Store the new uploaded avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } elseif ($request->filled('selected_avatar')) {
            // Delete the old uploaded avatar from storage if switching to a predefined one
            if ($oldAvatar && !str_contains($oldAvatar, 'avatars/avatar')) {
                Storage::disk('public')->delete($oldAvatar);
            }

            // Use the selected predefined avatar
            $avatarPath = $request->input('selected_avatar');
        } else {
            // No avatar uploaded or selected, keep the existing one
            $avatarPath = $oldAvatar;
        }

        // Update the user's profile with the new avatar
        $user->profile()->updateOrCreate([], [
            'avatar' => $avatarPath,
        ]);

        // Flash a success message
        flash()->success(__('profile.success.profile_picture_updated'));

        // Redirect back to the previous page
        return back();
    }

    // Additional Information
    private function additionalInformation(StoreProfileRequest $request)
    {
        $validated = $request->validated();

        $user = auth()->user();
        $user->profile->update($validated);
        flash()->success(__('profile.success.additional_information'));
        return back();
    }

    private function deleteMyAccount(Request $request)
    {
        $user = Auth::user();

        // Password is incorrect
        if (!password_verify($request->password, $user->password)) {
            flash()->error(__('profile.error.current_password_incorrect'));
            return back();
        }

        $user->delete();

        flash()->success(__('profile.success.account_deleted'));

        return redirect()->route('admin.dashboard');
    }
}
