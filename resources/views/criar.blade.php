@extends('layouts.app')

@section('titulo', 'Início')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create redirect link') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('criar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">URL original</label>
                            <input class="form-control" aria-describedby="urlHelp" type="text" name="url" placeholder="URL original">
                            <small id="urlHelp" class="form-text text-muted">Insira o link para o qual quer ser direcionado.</small>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label" for="exampleInputPassword1">Slug personalizado</label>
                            <input class="form-control" aria-describedby="slugHelp" type="text" name="slug" placeholder="Slug personalizado">
                            <small id="slugHelp" class="form-text text-muted">Insira um slug sem espaços ou caracteres especiais. Exemplo: apresentacao-do-projeto</small>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
