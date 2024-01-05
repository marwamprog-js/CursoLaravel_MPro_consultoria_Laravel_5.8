@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <div class="card border mt-5">
        <div class="card-body">

            <h5>Cadastro de Categorias</h5>

            <a href="{{ route('categorias.create') }}" class="btn btn-success mt-5">Cadastre suas Categorias</a>

            @if (count($cats) > 0)
                <table class="table table-ordered table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->nome }}</td>
                                <td>
                                    <a href="/categorias/{{ $cat->id }}/editar" class="btn btn-sm btn-primary">Editar</a>
                                    <button class="btn btn-sm btn-danger" onclick="setaDadosModal('{{ $cat->id }}')" data-toggle="modal" data-target="#apagarDados">Apagar</button>
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
          <p>Tem certeza que realmente deseja apagar categoria de ID: <span id="idApagar"></span>?</p>
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
        document.getElementById('btnConfirmarApagar').href = `/categorias/${id}/apagar`;
    }
  </script>
  
@endsection    