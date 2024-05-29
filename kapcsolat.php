<?php
use Dotenv\Dotenv;

require('vendor/autoload.php');

header("Content-Type:text/html; charset=utf-8");

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
define("DBHOST", $_ENV["DBHOST"]);
define("DBUSER", $_ENV["DBUSER"]);
define("DBPASS", $_ENV["DBPASS"]);
define("DBNAME", $_ENV["DBNAME"]);

$dbconn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check dbconnection
if ($dbconn->connect_error) {
    die("connection failed: " . $dbconn->connect_error);
}
mysqli_query($dbconn, "SET NAMES utf8");

if(!$dbconn->set_charset("utf8")) {
    die("nicn utf-8: " . $dbconn->connect_error);
}
?>