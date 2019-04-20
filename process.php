<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'crud';
$name = '';
$location = '';
$update = false;
$id = 0;
$mysqli = new mysqli($host, $user, $pass, $dbName) or die(mysqli_error($mysqli));

# kolla om 'spara-knappen' är tryckt

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    
    # skicka in i databasen
    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

    #spara i session
    $_SESSION['messege'] = 'Användare är sparad';
    $_SESSION['msg-type'] = 'Success';

    #stanna kvar på index
    header('location: index.php');
}

# har delete blivet tryckt?

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    # tar bort från db
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
    #spara medelande och css i session
    $_SESSION['messege'] = 'Användare är bortagen';
    $_SESSION['msg-type'] = 'Success';

    #stanna kvar på index
    header('location: index.php');
}
#om editknappen trycks
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
   
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    
}
#skicka in nya värden i db
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);

    #spara medelande och css i session
    $_SESSION['messege'] = 'Användare är uppdaterad';
    $_SESSION['msg-type'] = 'Success';

    #stanna kvar på index
    header('location: index.php');
}