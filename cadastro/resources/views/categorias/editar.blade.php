@extends('layouts.app', ["current" => "categorias"])

@section('body')
    <h4 class="mt-5">Editar Categoria</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('categorias.update', $cat->id) }}" method="POST">
                @csrf                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $cat->nome }}" placeholder="Ex.: Masculino, Feminino, Eletrônicos...">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Alterar</button>
                <a href="{{ route('categorias') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection    