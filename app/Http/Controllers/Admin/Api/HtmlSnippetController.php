<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Requests\HtmlSnippetRequest;
use App\Http\Requests\PdfRequest;
use App\Models\HtmlSnippet;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HtmlSnippetController
{
    public function index(Request $request)
    {
        return HtmlSnippet::query()->paginate($request->get('perPage'));
    }

    public function store(HtmlSnippetRequest $request)
    {
        HtmlSnippet::query()->create($request->validated());

        return response()->json(['message' => 'Resource added successfully!']);
    }

    public function show(HtmlSnippet $snippet)
    {
        return response()->json(['data' => $snippet]);
    }

    public function update(HtmlSnippetRequest $request, HtmlSnippet $snippet)
    {
        $snippet->updateOrFail($request->validated());

        return response()->json(['message' => 'Resource update successfully!']);
    }

    public function destroy(HtmlSnippet $snippet)
    {
        $snippet->deleteOrFail();

        return response()->json(['message' => 'Resource delete successfully!']);
    }
}
