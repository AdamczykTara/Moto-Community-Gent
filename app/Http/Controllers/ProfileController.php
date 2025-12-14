<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(User $user): View
    {
        $user->load(['profile', 'rides']);

        return view('profiles.show', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user();

        $profile = Profile::query()->firstOrCreate(
            ['user_id' => auth()->id(),]
        );

        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $profile = Profile::query()->firstOrCreate(
            ['user_id' => auth()->id(),]
        );

        $validated = $request->validate([
            'birthday'        => ['nullable', 'date'],
            'bio'             => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'moto_picture'    => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture) {
                Storage::disk('public')->delete($profile->profile_picture);
            }

            $validated['profile_picture'] =
                $request->file('profile_picture')->store('profiles', 'public');
        }

        if ($request->hasFile('moto_picture')) {
            if ($profile->moto_picture) {
                Storage::disk('public')->delete($profile->moto_picture);
            }

            $validated['moto_picture'] =
                $request->file('moto_picture')->store('motos', 'public');
        }

        $profile->update($validated);

        return redirect()
            ->route('profiles.show', $user)
            ->with('success', 'Profiel bijgewerkt');
    }
}
