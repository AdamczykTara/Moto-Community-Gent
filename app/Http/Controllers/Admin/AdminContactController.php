<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(): View
    {
        $contacts = ContactSubmission::query()->orderByDesc('created_at')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactSubmission $contact): View
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(ContactSubmission $contact): RedirectResponse
    {
        $contact->update(['read_at' => now()]);
        return back()->with('success', 'Contactformulier gemarkeerd als gelezen');
    }
}
