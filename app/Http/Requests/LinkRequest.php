<?php

namespace App\Http\Requests;

class LinkRequest extends AppFormRequest
{
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'link' => 'required|url|max:65535',
            'opens_in_new' => 'boolean',
        ];

        return $this->mapForUpdate($rules);
    }
}
