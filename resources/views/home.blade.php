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
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $item)  
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ENV('APP_URL')}}/{{ $item->slug }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('editarView', $item->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('excluir', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <abbr title="Excluir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                        </svg>
                                                    </abbr>
                                                </button>
                                            </form>
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
