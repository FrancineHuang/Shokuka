<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //ユーザーのアイコン写真をアップロード
        $user = $request->user();
        $validated = $request->validated();
        
        if ($request->hasFile('icon_path')) {
            $filename = 'icon-' . $user->id . '-' . uniqid() . '.jpg';
            $iconImg = Image::make($request->file('icon_path'))->fit(300, 300)->encode('jpg');
            //ローカルでもS3バケットでも同様なパス設定をします：
            $path = 'icon_image/' . $filename;
            //diskをS3に変更します
            Storage::disk('s3')->put($path, (string) $iconImg);
            //アップロードした画像のフルパスを取得：
            $validated['icon_path'] =  Storage::disk('s3')->url($path);
        }
    
        $user->fill($validated);
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
