<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEBUG</title>
</head>

<body>
    <form action="{{ route('debug') }}" method="post">
        @csrf
        <label for="">Titulo</label>
        <input type="text" name="title">
        <br>
        <label for="">Subtitulo</label>
        <input type="text" name="subtitle">
        <br>
        <label for="">Titulo</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Cadastrar artigo">
    </form>
</body>

</html>
