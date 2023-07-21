@extends('layouts.app')

@section('titulo', 'Início')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 class="mt-3"> {{ __('Create redirect link') }} </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.message')
                    
                    <form action="{{ route('criar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">URL original</label>
                            <input class="form-control" aria-describedby="urlHelp" type="text" name="url" placeholder="URL original" required>
                            <small id="urlHelp" class="form-text text-muted">{{ __('Enter the link you want to be directed to.') }}</small>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" for="exampleInputPassword1">Slug personalizado</label>
                            <input class="form-control" aria-describedby="slugHelp" type="text" name="slug" placeholder="Slug personalizado" required>
                            <small id="slugHelp" class="form-text text-muted">{{ __('Enter a slug without spaces or special characters. Example: project-presentation') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create link') }}</button>
                    </form>
                </div>
            </div>
          
            <div class="card mt-3">
                <div class="card-header"><h3 class="mt-3"> {{ __('Links created') }} </h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Custom link') }}</th>
                                    <th scope="col">{{ __('Original link') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $item)  
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>https://url.inteligenciaedu.com.br/link/{{ $item->slug }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('editarView', $item->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
