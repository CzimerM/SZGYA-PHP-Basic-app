<?php
require("kapcsolat.php");

if (isset($_POST["nev"]))
{
    $nev = htmlspecialchars(trim(ucwords(strtolower($_POST["nev"]))));
    $mobil = htmlspecialchars(trim($_POST["mobil"]));
    $email = htmlspecialchars(trim(strtolower($_POST["email"])));

    $errs = [];

    if (empty($nev))
    {
        array_push($errs, "Nem adott meg nevet!");
    }

    if(!(count($errs) === 0))
    {
        foreach($errs as $err)
        {
            echo $err;
        }
        die();
    }

    $sql = "INSERT INTO `dolgozok` (`id`, `nev`, `email`, `mobil`) VALUES (NULL, '{$nev}', '{$email}', '{$mobil}');";
    $dbconn->query($sql);
    header("Location: lista.php");
}
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolgozók</title>
    <link rel="stylesheet" href="stilus.css">
    <style>
        form * {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <label for="nev">Név</label>
            <input type="text" name="nev" id="nev"> <br>
            <label for="mobil">Mobil</label>
            <input type="text" name="mobil" id="mobil"> <br>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email"> <br>
            <input type="submit" value="Rendben">
        </form>
    </div>
</body>
</html>