<?php
header("Content-Type:text/html; charset=utf-8");
define("DBHOST", "localhost");
define("DBUSER","root");
define("DBPASS", "");
define("DBNAME", "dolgozok");

// Create dbconnection
$dbconn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check dbconnection
if (!$dbconn) {
    die("connection failed: " . mysqli_connect_error());
}
mysqli_query($dbconn, "SET NAMES utf8");
// echo "connected successfully";
?>