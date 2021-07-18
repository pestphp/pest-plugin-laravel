<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ContactsController
{
    use ValidatesRequests;

    public function __invoke(Request $request): void
    {
        $request->validate([
            'name'  => ['required'],
            'email' => ['required'],
        ]);
    }
}
