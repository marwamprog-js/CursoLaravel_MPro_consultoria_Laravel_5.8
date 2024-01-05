@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <h4 class="mt-5">Editar Produto</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.update', $prod->id) }}" method="POST">
                @csrf

                @if (count($categorias) > 0)
                    <div class="form-group">
                        <label for="categoria">Selecione uma categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            @foreach ($categorias as $cat)
                                @if ($cat->id == $prod->categoria_id)
                                    <option value="{{ $cat->id }}" selected>{{ $cat->nome }}</option>                            
                                @else    
                                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>                            
                                @endif
                            @endforeach
                        </select>
                    </div>                    
                @endif
                

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $prod->nome }}" placeholder="Ex.: Camisa, Calça Jeans, Teclado...">
                </div>

                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" class="form-control" name="estoque" id="estoque" value="{{ $prod->estoque }}">
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" value="{{ $prod->preco }}">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Alterar</button>
                <a href="{{ route('produtos') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection    