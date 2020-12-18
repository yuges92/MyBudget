<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TestController extends Controller
{

    public function index()
    {
        return Inertia::render('TestComponent', [
            'text' => "Hello World!"
        ]);
    }
}
