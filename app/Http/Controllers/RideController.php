<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RideController extends Controller
{
    public function create(): View
    {
        return view('rides.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'photo'       => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] =
                $request->file('photo')->store('rides', 'public');
        }

        $validated['user_id'] = Auth::id();

        Ride::query()->create($validated);

        return redirect()
            ->route('profiles.show', Auth::user())
            ->with('success', 'Rit toegevoegd');
    }

    public function edit(Ride $ride): View
    {
        $this->authorizeRide($ride);

        return view('rides.edit', compact('ride'));
    }

    public function update(Request $request, Ride $ride): RedirectResponse
    {
        $this->authorizeRide($ride);

        $validated = $request->validate([
            'title'       => ['required'],
            'description' => ['nullable'],
            'photo'       => ['nullable', 'image'],
        ]);

        if ($request->hasFile('photo')) {
            if ($ride->photo) {
                Storage::disk('public')->delete($ride->photo);
            }

            $validated['photo'] =
                $request->file('photo')->store('rides', 'public');
        }

        $ride->update($validated);

        return redirect()->route('profiles.show', Auth::user());
    }

    public function destroy(Ride $ride): RedirectResponse
    {
        $this->authorizeRide($ride);

        if ($ride->photo) {
            Storage::disk('public')->delete($ride->photo);
        }

        $ride->delete();

        return back();
    }

    private function authorizeRide(Ride $ride): void
    {
        abort_if($ride->user_id !== Auth::id(), 403);
    }
}
