<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Requests\HtmlSnippetRequest;
use App\Http\Requests\LinkRequest;
use App\Http\Requests\PdfRequest;
use App\Models\HtmlSnippet;
use App\Models\Link;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController
{
    public function index(Request $request)
    {
        return Link::query()->paginate($request->get('perPage'));
    }

    public function store(LinkRequest $request)
    {
        Link::query()->create($request->validated());

        return response()->json(['message' => 'Resource added successfully!']);
    }

    public function show(Link $link)
    {
        return response()->json(['data' => $link]);
    }

    public function update(LinkRequest $request, Link $link)
    {
        $link->updateOrFail($request->validated());

        return response()->json(['message' => 'Resource update successfully!']);
    }

    public function destroy(Link $link)
    {
        $link->deleteOrFail();

        return response()->json(['message' => 'Resource delete successfully!']);
    }
}
