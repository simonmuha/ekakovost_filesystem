<!DOCTYPE html>
<html>
<head>
    <title>Prijavni podatki</title>
</head>
<body>
    <p><b>Spoštovani {{ $user->name }},</b></p>
    <br>
    <p>Pošiljamo vam prijavne podatke za vstop v aplikacijo eKakovost.</p>
    <br>
    <p>Vaši prijavni podatki so:</p>
    <table>
        <tr>
            <td>E-naslov: </td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Geslo:</td>
            <td>{{ $password }}</td>
        </tr>
    </table>
    <br>
    <p>V aplikacijo se prijavite na spletnem naslovu <a href="http://www.ekakovost.com">www.ekakovost.com</a>.</p>
    <br>
    <p>Skupina za kakovost ERŠ</p>
</body>
</html>
