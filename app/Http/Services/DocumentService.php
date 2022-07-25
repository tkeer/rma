<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class DocumentService
{
    public function store(?UploadedFile $file): string
    {
        if (! $file) {
            return "";
        }

        $path = $file->store('pdfs', 'public');

        return "storage/$path";
    }
}