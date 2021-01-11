<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TestController extends Controller
{

    public function index()
    {
        $files= collect(Storage::disk('public')->files('svg-icons'))->map(function($file) {
            return Storage::url($file);
        });

        return response()->json($files,201);
    }
}
