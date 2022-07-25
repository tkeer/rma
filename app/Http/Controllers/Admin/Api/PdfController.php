<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Requests\PdfRequest;
use App\Http\Services\DocumentService;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController
{
    private DocumentService $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function index(Request $request)
    {
        return Pdf::query()->paginate($request->get('perPage'));
    }

    public function store(PdfRequest $request)
    {
        $path = $this->documentService->store($request->file('file'));
        Pdf::create(['path' => $path, 'title' => $request->get('title')]);

        return response()->json(['message' => 'Resource added successfully!']);
    }

    public function show(Pdf $pdf)
    {
        return response()->json(['data' => $pdf]);
    }

    public function update(PdfRequest $request, Pdf $pdf)
    {
        $data['title'] = $request->get('title');
        $data['path'] = $this->documentService->store($request->file('file'));

        $pdf->updateOrFail($data);

        return response()->json(['message' => 'Resource update successfully!']);
    }

    public function destroy(Pdf $pdf)
    {
        $pdf->deleteOrFail();
        return response()->json(['message' => 'Resource deleted successfully!']);
    }
}
