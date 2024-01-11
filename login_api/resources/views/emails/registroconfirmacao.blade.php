<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h4>Seja bem vindo(a), {{ $nome }}</h4>
    <p>Você acabou de acessar o sistema utilizando seu Email: {{ $email }}</p>    
    <p>Data/Hora de acesso: {{ $datahora }}</p>
    <p>Clique no link abaixo para confirmar seu email de registro: </p>
    <a href="{{ $link }}">CLIQUE AQUI</a>
</body>
</html>