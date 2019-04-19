<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'crud';
$mysqli = new mysqli($host, $user, $pass, $dbName) or die(mysqli_error($mysqli));

# kolla om 'spara-knappen' är tryckt

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];

    # skicka in i databasen
    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);
}

# har delete blivet tryckt?

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    # tar bort från db
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli_error());
}