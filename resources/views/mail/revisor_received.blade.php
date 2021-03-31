<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dati del candidato Revisore</title>
</head>
<body>
    <h1 style="text-align: center;">Un nuovo utente richiede di entrare nel team di Presto.it </h1>
    <h2>Dati del revisore:</h2>
    <ul>
    <li>Nome: {{$revisor->user['name']}}</li>
    <li>e-mail: {{$revisor->user['email']}}</li>
    <li>Indirizzo: {{$revisor['address']}}</li>
    <li>Data di nascita: {{$revisor['date']}}</li>
    <li>Numero di telefono: {{$revisor['phone']}}</li>
    <li>Descrizione candidatura: {{$revisor['body']}}</li>
    </ul>

    <p><a href="">Valuta revisore</a></p>
</body>
</html>