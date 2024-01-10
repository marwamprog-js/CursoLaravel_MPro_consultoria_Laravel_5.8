<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h4>Seja bem vindo(a), {{ $nome }}</h4>

    <p>Você acabou de acessar o sistema utilizando o seu email: {{ $email }}</p>
    <p>Data/Hora de acesso: {{ $datahora }}</p>

    <div>
        <img src="{{ $message->embed( public() . '/image/laravel.jpg' ) }}" width="10%" height="10%" alt="">
    </div>
</body>
</html>