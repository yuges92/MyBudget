<?php


namespace App\Models;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Icon
{

    /**
     * @return Collection of icons
     */
    public static function  getIconsAsFileList(): Collection
    {
        return collect(Storage::disk('public')->files('svg-icons'))->map(function ($file) {
            return Storage::url($file);
        });
    }
}
