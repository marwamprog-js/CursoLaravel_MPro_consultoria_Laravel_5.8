<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" >
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border mt-5">
                    <div class="card-header">
                        <div class="card-title">Clientes</div>
                        <hr>
                        <a href="/novocliente" class="btn btn-primary btn-sm">Novo</a>
                    </div>
                    <div class="card-body">

                       @if (count($clientes) > 0)                           
                        <table class="table table-bordered table-hover" id="tabelaprodutos">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Idade</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->nome }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->endereco }}</td>
                                        <td>{{ $c->idade }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       @else
                        <div class="alert alert-info" role="alert">
                            <p>Nenhum cliente cadastrado. Para cadastrar um cliente, <a href="/novocliente">clique aqui</a>.</p>
                        </div>                      
                       @endif

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>