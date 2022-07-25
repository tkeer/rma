<?php

namespace App\Http\Requests;

class PdfRequest extends AppFormRequest
{
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimetypes:application/pdf',
        ];

        return $this->mapForUpdate($rules);
    }
}
