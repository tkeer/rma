<?php

namespace App\Http\Requests;

class HtmlSnippetRequest extends AppFormRequest
{
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'descr' => 'required|max:1024',
            'snippet' => 'required',
        ];

        return $this->mapForUpdate($rules);
    }
}
