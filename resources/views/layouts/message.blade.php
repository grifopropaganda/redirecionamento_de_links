@if (Session::has("success"))
    <div class="mt-2">
        <div class="alert alert-success text-xs md:text-sm" role="alert">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
@if (Session::has("error"))
    <div class="mt-2">
        <div class="alert alert-danger text-xs md:text-sm" role="alert">
            {{ Session::get('error') }}
        </div>
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