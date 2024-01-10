<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            text-align: center
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Catgorias</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nome }}</td>
                    <td>
                        <ul>
                            @foreach ($p->categorias as $c)
                                <li>{{ $c->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>