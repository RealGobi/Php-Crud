<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="SCSS/style.css">
    <title>CRUD PHP/MySQL</title>
</head>
<body>
<?php require_once 'process.php'; ?>

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'crud';
$mysqli = new mysqli($host, $user, $pass, $dbName) or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli_error);
#pre_r($result);
?>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Namn</th>
                    <th>Plats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['location'] ?></td>
                <td></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

<?php
function pre_r ($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
    <form action="process.php" method="post">
        <label>Name: </label>
        <input type="text" name="name" value="Enter your name">
        <label>Location: </label>
        <input type="text" name="location" value="Enter your location">
        <button type="submit" name="save">Save</button>
    </form>
</body>
</html>