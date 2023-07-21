<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar redirecionamento de link</title>
</head>
<body>
    <form action="/store" method="post">
        @csrf
        <input type="text" name="url" placeholder="URL original">
        <input type="text" name="slug" placeholder="Slug personalizado (opcional)">
        <button type="submit">Criar link</button>
    </form>    
</body>
</html>