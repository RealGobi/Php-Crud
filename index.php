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
<?php if(isset($_SESSION['message'])); ?>

<div class="<?=$_SESSION['msg_type']?>">
<?php
    echo $_SESSION['messege'];
    unset($_SESSION['message']);
?>
</div>
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'crud';
$mysqli = new mysqli($host, $user, $pass, $dbName) or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli_error);
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
                <td>
                    <a href="index.php?edit=<?php echo $row['id'];?>" class="edit">Edit</a>
                    <a href="index.php?delete=<?php echo $row['id'];?>" class="delete">Delete</a>
                </td>
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter your name">
        <label>Location: </label>
        <input type="text" name="location" value="<?php echo $location ?>" placeholder="Enter your location">
        <?php 
        if($update == true):
        ?>
        <button type="submit" name="update">Update</button>
        <?php else: ?>
        <button type="submit" name="save">Save</button>
        <?php endif ?>
    </form>
</body>
</html>