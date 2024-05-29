<?php
require("kapcsolat.php");
$sql = "DELETE FROM dolgozok WHERE id like {$_GET['id']}";
$dbconn->query($sql);
header("Location: lista.php");
exit();
?>