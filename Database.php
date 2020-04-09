<?php
$host = "localhost";
$username = "root";
$password = "";


try {
$con = new PDO("mysql:host=$host;dbname=ziekmelding", $username, $password);

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "";
} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>