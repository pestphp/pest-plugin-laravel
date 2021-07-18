<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::post('/contacts', \App\Http\Controllers\ContactsController::class)->name('contacts');

Artisan::command('inspire', function () {
    $this->comment('pest');
});
