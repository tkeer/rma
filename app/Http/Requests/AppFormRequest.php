<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

abstract class AppFormRequest extends FormRequest
{
    protected function mapForUpdate(array $rules): array
    {
        if (request()->isMethod('post')) {
            return $rules;
        }

        return Arr::map($rules, fn ($rule) => Str::replace('required', 'sometimes', $rule));
    }
}
