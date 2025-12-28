<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//_______________________________________________________________________________________________________________________
// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::middleware('auth')->post(
    '/news/{news}/comments',
    [NewsController::class, 'storeComment']
)->name('news.comments.store');

//_______________________________________________________________________________________________________________________
// Faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::patch('/admin/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
});

//_______________________________________________________________________________________________________________________
// Contact
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{contactSubmission}', [ContactController::class, 'show'])->name('contact.show');
    Route::post('/contact/{contactSubmission}/answer', [ContactController::class, 'answer'])->name('contact.answer');
});

//_______________________________________________________________________________________________________________________
// Profile + rides
Route::get('/profiles/{user}', [ProfileController::class, 'show'])
    ->name('profiles.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profiles.update');

    Route::get('/rides/create', [RideController::class, 'create'])->name('rides.create');
    Route::post('/rides', [RideController::class, 'store'])->name('rides.store');
    Route::get('/rides/{ride}/edit', [RideController::class, 'edit'])->name('rides.edit');
    Route::patch('/rides/{ride}', [RideController::class, 'update'])->name('rides.update');
    Route::delete('/rides/{ride}', [RideController::class, 'destroy'])->name('rides.destroy');
});

//_______________________________________________________________________________________________________________________
// Private messages
Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
});

//_______________________________________________________________________________________________________________________
// Admin

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', AdminUserController::class);

        Route::get('contact', [AdminContactController::class, 'index'])
            ->name('contact.index');

        Route::get('contact/{contactSubmission}', [AdminContactController::class, 'show'])
            ->name('contact.show');
    });