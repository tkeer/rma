@extends("user.master")

@section("sectionTitle")
    Snippets
@endsection

@section("content")

    @foreach($snippets as $snippet)
        <div class="p-1 mb-4 bg-light rounded-3 border">
            <div class="container-fluid py-2">
                <div class="snippet-container">
                    <div class="my-2">
                        <div class="show-more-less" style="position: relative">
                            @if(\Illuminate\Support\Str::length($snippet->descr) > 300)
                                <input id="ch" type="checkbox" style="display: none">
                                <label class="text-primary" for="ch"></label>
                            @endif

                            <div class="d-flex justify-content-between description limited">
                                <p>{{ \Illuminate\Support\Str::limit($snippet->descr, 300) }}</p>
                            </div>
                            @if(\Illuminate\Support\Str::length($snippet->descr) > 300)
                                <div class="description complete">
                                    {{ $snippet->descr }}
                                </div>
                            @endif
                        </div>

                        <div><button class="btn btn-link copy-to-clipboard--js">Copy to clipboard</button> </div>

                        <div
                                class="mt-3 border p-3 snippet-text bg-white"
                                style="max-height: 300px; overflow-y: scroll"
                        >{!! $snippet->snippet !!}</div>
                    </div>

                </div>
            </div>
        </div>

    @endforeach

    <div>
        {{ $snippets->links() }}
    </div>

    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div id="clipboard-toast" class="toast" style="position: fixed; top: 0; right: 0;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-success">
            Copied to clipboard.
        </div>
    </div>
    </div>


@endsection

@push('scripts')
<script>

  let timeout

  function copyToClipboard(elem) {
    const html = elem.closest(".snippet-container").querySelector(".snippet-text").innerHTML
    navigator.clipboard.writeText(html).then(() => {
      document.querySelector("#clipboard-toast").classList.add("show")

      clearTimeout(timeout)

      timeout = setTimeout(() => {
        document.querySelector("#clipboard-toast").classList.remove("show")
      }, 3000)
    })
  }

  window.addEventListener('DOMContentLoaded',function () {
    document.querySelectorAll('.copy-to-clipboard--js').forEach( button => {
      button.onclick = function () {
        copyToClipboard(this)
      }
    });
  });
</script>
@endpush