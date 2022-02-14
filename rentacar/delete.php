
<?php

$id = $_GET['id'];

$dbname = "carrental";
$db = mysqli_connect("localhost", "root", "", $dbname);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "UPDATE vozila SET kolicina = kolicina - 1 WHERE Id = $id";

if (mysqli_query($db, $sql)) {
    mysqli_close($db);
    header('Location: administracija.php'); 
    exit;
} else {
    echo "Error deleting record";
}