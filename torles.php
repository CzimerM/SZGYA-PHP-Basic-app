<?php
require("kapcsolat.php");
if (!isset($_GET["id"]))
{
    echo "Id paraméter hiányzik";
    die();
}

$sql = "DELETE FROM dolgozok WHERE id like {$_GET['id']}";
if($dbconn->query($sql))
{
    header("Location: lista.php");
    exit();
}
else
{
    echo("Error description: " . $dbconn->error);
}

?>