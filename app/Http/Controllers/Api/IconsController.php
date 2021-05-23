<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IconsController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        $files = collect();

        $allFiles = collect(Storage::disk('public')->files('svg-icons'));

        $allFiles->filter(function ($file) use ($files) {
            if (File::extension($file) === "svg") {
                $files->push(Storage::url($file));
            }
        });

        return response()->json($files, 201);
    }
}
