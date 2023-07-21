@extends('layouts.app')

@section('titulo', 'Editar Url')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 class="mt-3"> {{ __('Edit redirect link') }} </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.message')
                    
                    <form action="{{ route('editar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $link->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">URL original</label>
                            <input class="form-control" value="{{ $link->url }}" type="text" name="url" placeholder="URL original">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" for="exampleInputPassword1">Slug personalizado</label>
                            <input class="form-control" aria-describedby="slugHelp" type="text" value="{{ $link->slug }}" name="slug" placeholder="Slug personalizado">
                            <small id="slugHelp" class="form-text text-muted">{{ __('Enter a slug without spaces or special characters. Example: project-presentation') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Edit link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
