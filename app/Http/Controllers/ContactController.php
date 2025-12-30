<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $submission = ContactSubmission::query()->create($validated);

        Mail::raw(
            "Naam: $submission->name\nEmail: $submission->email\n\n$submission->message",
            function ($mail) use ($submission) {
                $mail->to(config('mail.from.address'))
                    ->subject($submission->subject ?? 'Nieuw contactbericht');
            }
        );

        return redirect()->back()->with('success', 'Bericht verzonden.');
    }

    public function index(): View
    {
        $submissions = ContactSubmission::query()->orderByDesc('created_at')->get();

        return view('admin.contact.index', compact('submissions'));
    }

    public function show(ContactSubmission $contactSubmission): View
    {
        return view('admin.contact.show', compact('contactSubmission'));
    }

    public function answer(Request $request, ContactSubmission $contactSubmission): RedirectResponse
    {
        if ($contactSubmission->answered) {
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

        return redirect()->route('admin.contact.index')
            ->with('success', 'Antwoord verzonden.');
    }
}
