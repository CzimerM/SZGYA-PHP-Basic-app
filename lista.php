<?php
require("kapcsolat.php");

$kifejezes = isset($_POST["kifejezes"]) ? mysqli_real_escape_string($dbconn, $_POST["kifejezes"]) : "";
$sql = "SELECT * FROM dolgozok WHERE nev LIKE '%{$kifejezes}%'";

$result = $dbconn->query($sql);

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolgozók</title>
    <link rel="stylesheet" href="stilus.css">
</head>

<body>
    <div class="container">
        <h1>Dolgozók</h1>
        <form method="post">
            <input type="search" name="kifejezes" id="kifejezes">
            <p><a href="felvitel.php">Új dolgozó felvitele</a></p>
            <!-- ide kerül a php kimenet -->
        </form>
        <table>
            <tr>
                <th>Név</th>
                <th>Email</th>
                <th>Mobil</th>
                <th>Művelet</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row["nev"]}</td>
                        <td>{$row["email"]}</td>
                        <td>{$row["mobil"]}</td>
                        <td>
                            <a href=\"modositas.php?id={$row['id']}\">Módosítás</a> <b>|</b>
                            <a href=\"torles.php?id={$row['id']}\">Törlés</a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>
</body>

</html>