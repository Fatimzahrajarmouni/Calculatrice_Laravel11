<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="box">
    <form action="/calculer" method="POST">
        @csrf
        <label for="nombre1" class="label1">Nombre 1:</label>
        <input type="text" id="nombre1" name="nombre1" required>
        <br>
        <label for="operateur">Opérateur:</label><br><br>
        <select id="operateur" name="operateur">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>
        <label for="nombre2" class="label2">Nombre 2:</label>
        <input type="text" id="nombre2" name="nombre2" required>
        <br>
        <br>
        <center><button type="submit">OK</button></center>
    </form>

    <?php
    if (request()->isMethod('post')) {
        $nombre1 = request('nombre1');
        $operateur = request('operateur');
        $nombre2 = request('nombre2');

        switch ($operateur) {
            case '+':
                $result = $nombre1 + $nombre2;
                break;
            case '-':
                $result = $nombre1 - $nombre2;
                break;
            case '*':
                $result = $nombre1 * $nombre2;
                break;
            case '/':
                $result = $nombre1 / $nombre2;
                break;
            default:
                $result = "Opérateur non valide";
        }

        echo "<p>Le résultat de l'operation de $nombre1 et $nombre2 est : $result</p>";
    }
    ?>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
</body>
</html>
