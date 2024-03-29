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
                        <div class="card-title">Cadastro de Clientes</div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach   
                                </div>   
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente</label>
                                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }} " type="text" name="nome" id="nome" placeholder="Nome do cliente" >
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Nome do Cliente</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" placeholder="Email do cliente" >
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do Cliente</label>
                                <input class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" type="text" name="idade" id="idade" placeholder="Idade do cliente" >
                                @if ($errors->has('idade'))
                                    <div class="invalid-feedback">{{ $errors->first('idade') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço do Cliente</label>
                                <input class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" type="text" name="endereco" id="endereco" placeholder="Endereço do cliente" >
                                @if ($errors->has('endereco'))
                                    <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>