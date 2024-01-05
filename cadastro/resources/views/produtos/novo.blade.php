@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <h4 class="mt-5">Novo Produto</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos') }}" method="POST">
                @csrf

                @if (count($categorias) > 0)
                    <div class="form-group">
                        <label for="categoria">Selecione uma categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            @foreach ($categorias as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>                            
                            @endforeach
                        </select>
                    </div>                    
                @endif
                

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: Camisa, Calça Jeans, Teclado...">
                </div>

                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" class="form-control" name="estoque" id="estoque">
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                <a href="{{ route('produtos') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection    