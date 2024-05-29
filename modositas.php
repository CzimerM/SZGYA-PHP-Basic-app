<?php
require("kapcsolat.php");
$nev = "";
$mobil = "";
$email = "";

if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    $sql = "SELECT * FROM dolgozok WHERE id like {$_GET['id']}";
    $res = $dbconn->query($sql)->fetch_all(MYSQLI_ASSOC);
    
    if (isset($res))
    {
        $nev = $res["nev"];
        $mobil = $res["mobil"];
        $email = $res["email"];
    }
}

if(false)
{
    $sql = "UPDATE dolgozok SET nev = '{$nev}', email = '{$email}', mobil = '{$mobil}' WHERE id = {$id};";
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
        <?php
        echo "<form method=\"post\">
        <label for=\"nev\">Név</label>
        <input type=\"text\" name=\"nev\" id=\"nev\" value={$nev}> <br>
        <label for=\"mobil\">Mobil</label>
        <input type=\"text\" name=\"mobil\" id=\"mobil\" value={$mobil}> <br>
        <label for=\"email\">E-mail</label>
        <input type=\"email\" name=\"email\" id=\"email\" value={$email}> <br>
        <input type=\"submit\" value=\"Rendben\">
        </form>";
            
        ?>
    </div>
</body>
</html>