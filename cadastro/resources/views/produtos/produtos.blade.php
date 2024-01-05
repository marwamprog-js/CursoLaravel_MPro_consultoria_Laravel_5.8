@extends('layouts.app', ["current" => "produtos"])

@section('body')
<div class="card border mt-5">
    <div class="card-body">

        <h5>Cadastro de Produtos</h5>

        <a href="{{ route('produtos.create') }}" class="btn btn-success mt-5">Cadastre seus Produtos</a>

        @if (count($produtos) > 0)
            <table class="table table-ordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $prod)                    
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->nome }}</td>
                            <td>{{ $prod->estoque }}</td>
                            <td>{{ $prod->preco }}</td>
                            <td>
                                <a href="/produtos/{{ $prod->id }}/editar" class="btn btn-sm btn-primary">Editar</a>
                                <button class="btn btn-sm btn-danger" onclick="setaDadosModal('{{ $prod->id }}')" data-toggle="modal" data-target="#apagarDados">Apagar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>                
        @endif
    </div>        
</div>

<!-- Modal -->
<div class="modal fade" id="apagarDados" tabindex="-1" aria-labelledby="apagarDadosLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="apagarDadosLabel">Apagando dados</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Tem certeza que realmente deseja apagar produto de ID: <span id="idApagar"></span>?</p>
    </div>
    <div class="modal-footer">
        <a href="#" id="btnConfirmarApagar" class="btn btn-sm btn-primary">Confirmar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div>
</div>

<script>
function setaDadosModal(id) {
    document.getElementById('idApagar').innerHTML = id;
    document.getElementById('btnConfirmarApagar').href = `/produtos/${id}/apagar`;
}
</script>
@endsection 