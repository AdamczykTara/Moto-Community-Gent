<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request): View
    {
        $query = User::with('profile');

        if ($request->filled('search')) {
            $query->where('username', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('role')) {
            if ($request->role === 'admin') {
                $query->where('is_admin', true);
            } elseif ($request->role === 'user') {
                $query->where('is_admin', false);
            }
        }

        $users = $query->orderBy('username')->get();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['sometimes', 'boolean'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        Profile::query()->firstOrCreate(['user_id' => $user->id]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker toegevoegd');
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'is_admin' => ['sometimes', 'boolean'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with('success', 'Gebruiker verwijderd');
    }

    public function toggleAdmin(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan je eigen adminrechten niet aanpassen.');
        }

        $user->update([
            'is_admin' => !$user->is_admin,
        ]);

        return back()->with('success', 'Adminrechten aangepast.');
    }
}
