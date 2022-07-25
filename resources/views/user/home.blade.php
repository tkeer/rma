@extends("user.master")

@section("sectionTitle")
    Pdfs
@endsection

@section("content")
    @foreach($pdfs as $pdf)
        <div class="p-1 mb-4 bg-light rounded-3 border">
            <div class="container-fluid py-2">
                <div>
                    <div class="my-2">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('downloadPdf', ['pdf' => $pdf->id]) }}">{{ $pdf->title }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection