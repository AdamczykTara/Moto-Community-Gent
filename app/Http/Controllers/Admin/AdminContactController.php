<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class AdminContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(): View
    {
        $contacts = ContactSubmission::query()->orderByDesc('created_at')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show(ContactSubmission $contactSubmission): View
    {
        return view('admin.contact.show', compact('contactSubmission'));
    }

    public function answer(Request $request, ContactSubmission $contactSubmission): RedirectResponse
    {
        if ($contactSubmission->isAnswered()) {
            return back()->with('error', 'Dit bericht is al beantwoord.');
        }

        $request->validate([
            'answer' => ['required', 'string'],
        ]);

        Mail::raw($request->answer, function ($mail) use ($contactSubmission) {
            $mail->to($contactSubmission->email)
                ->subject('Antwoord op je contactbericht');
        });

        $contactSubmission->update([
            'answered' => true,
        ]);

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Antwoord verzonden.');
    }
}
