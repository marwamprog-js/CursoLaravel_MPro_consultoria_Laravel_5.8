@extends('layouts.app', ["current" => "produtos"])

@section('body')
<div class="card border mt-5">
    <div class="card-body">

        <h5>Cadastro de Produtos</h5>

        <button class="btn btn-success mt-5" role="button" data-toggle="modal" data-target="#dlgProdutos" onclick="limparCampos();">Cadastre seus Produtos</button>

            <table class="table table-ordered table-hover mt-4" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Categoria</th>
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

    // Carrega o token do Laravel em todas as requisições
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });


    function criarProduto(){
        id = $('#id').val();

        if(id == '') {
            prod = {
                nome: $('#nome').val(),
                estoque: $('#estoque').val(),
                preco: $('#preco').val(),
                categoria_id: $('#categoria').val(),
            }
        } else {
            prod = {
                id: id,
                nome: $('#nome').val(),
                estoque: $('#estoque').val(),
                preco: $('#preco').val(),
                categoria_id: $('#categoria').val(),
            }
        }

        return prod;
    }
    

    $('#formProduto').submit( function(event) {
        event.preventDefault();
        id = $('#id').val();

        if(id == '') {
            prod = criarProduto();
            
            $.post("/api/produtos", prod, function(data) {
                produto = JSON.parse(data);
                linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);       
            });

            $('#dlgProdutos').modal('hide');
        } else {
            prod = criarProduto();
            
            $.ajax({
            type: "PUT",
            url: "/api/produtos/" + id,
            context: this,
            data: prod,
            success: function(data) {

                prod = JSON.parse(data);

                linhas = $('#tabelaProdutos>tbody>tr');
                el = linhas.filter(function(i, elemento) {
                    return elemento.cells[0].textContent == id;
                });
                
                if(el) {
                    el[0].cells[0].textContent = prod.id;
                    el[0].cells[1].textContent = prod.nome;
                    el[0].cells[2].textContent = prod.estoque;
                    el[0].cells[3].textContent = prod.preco;
                    el[0].cells[4].textContent = prod.categoria_id;
                }
                    
            },
            error: function(error) {
                console.log(error)
            }
        });
            
            $('#dlgProdutos').modal('hide');
        }


        // carregarProdutos();

    });


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

    function carregarProdutos() {
        $('#tabelaProdutos>tbody').html('');
        $.getJSON('/api/produtos', function(produtos) {
            for(i = 0; i < produtos.length; i++) {
                linha = montarLinha(produtos[i]);

                $('#tabelaProdutos>tbody').append(linha);
            }
        });
    }

    function montarLinha(produto) {
        let linha = `<tr>
                <td>${produto.id}</td>
                <td>${produto.nome}</td>
                <td>${produto.estoque}</td>
                <td>${produto.preco}</td>
                <td>${produto.categoria_id}</td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="editar('${produto.id}');">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="remover('${produto.id}');">Apagar</button>
                </td>
            </tr>`;
        return linha;
    }

    function editar(id) {
        $.getJSON('/api/produtos/' + id, function(produto) {
            console.log(produto);
            limparCampos();

            $('#id').val(produto.id);
            $('#nome').val(produto.nome);
            $('#preco').val(produto.preco);
            $('#estoque').val(produto.estoque);
            $('#categoria').val(produto.categoria_id);

            $('#dlgProdutos').modal('show');
        });
    }

    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "/api/produtos/" + id,
            context: this,
            success: function(data) {
                
                linhas = $('#tabelaProdutos>tbody>tr');
                el = linhas.filter(function(i, elemento) {
                    return elemento.cells[0].textContent == id;
                });
                
                if(el)
                    el.remove();
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    $(function() {
        carregarProdutos();
        carregarCategorias();
    });

</script>
@endsection