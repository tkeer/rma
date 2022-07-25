@extends("user.master")

@section("sectionTitle")
    Links
@endsection

@section("content")

    @foreach($links as $link)
        <div class="p-1 mb-4 bg-light rounded-3 border">
            <div class="container-fluid py-2">
                <div class="my-2">
                    <a class="text-break" href="{{ $link->link }}" target="{{ $link->opens_in_new ? "_blank" : "_self" }}">
                        {{ $link->title }}
                    </a>
                </div>
            </div>
        </div>

    @endforeach
@endsection