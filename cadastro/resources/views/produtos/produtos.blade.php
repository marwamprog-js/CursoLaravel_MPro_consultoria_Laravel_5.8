@extends('layouts.app', ["current" => "produtos"])

@section('body')
<div class="card border mt-5">
    <div class="card-body">

        <h5>Cadastro de Produtos</h5>

        <button class="btn btn-success mt-5" role="button" data-toggle="modal" data-target="#dlgProdutos" onclick="limparCampos();">Cadastre seus Produtos</button>

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
                    
                </tbody>
            </table>  
    </div>        
</div>

<!-- Modal -->
<div class="modal fade" id="dlgProdutos" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form action="form-horizontal" id="formProduto">
        <div class="modal-header">
            <h5 class="modal-title">Novo Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>      
        </div>
        <div class="modal-body">

            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nome" class="control-label">Nome</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
                </div>
            </div>

            <div class="form-group">
                <label for="preco" class="control-label">Preço</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do produto">
                </div>
            </div>

            <div class="form-group">
                <label for="estoque" class="control-label">Estoque</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="estoque" name="estoque" placeholder="Quantidade para estoque">
                </div>
            </div>

            <div class="form-group">
                <label for="categoria" class="control-label">Categorias</label>
                <div class="input-group">
                    <select class="form-control" id="categoria" name="categoria">
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="cancel" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </form>
  </div>
</div>
</div>

@endsection 

@section('javascript')
<script type="text/javascript">

    function limparCampos() {
        $('#id').val('');
        $('#nome').val('');
        $('#preco').val('');
        $('#estoque').val('');
    }

    function carregarCategorias() {
        $.getJSON('/api/categorias/get-all', function(data) {

            for(i = 0; i < data.length; i++) {
                option = `<option value="${data[i].id}">${data[i].nome}</option>`;

                $('#categoria').append(option);
            }
        });
    }

    $(function() {
        carregarCategorias();
    });

</script>
@endsection