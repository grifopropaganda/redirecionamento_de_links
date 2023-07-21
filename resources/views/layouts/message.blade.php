@if (Session::has("message"))
    <div class="mt-2">
        @if (Session::get('status') == 200)
            <div class="alert alert-success text-xs md:text-sm" role="alert">
                {{ Session::get('message') }}
            </div>
        @else
            <div class="alert alert-danger text-xs md:text-sm" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
@endif
@if ($errors->any())
    <div class="mt-2">
        <div class="alert alert-danger text-xs md:text-sm" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif