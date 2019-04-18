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
    <form action="process.php" method="post">
        <label>Name: </label>
        <input type="text" name="name" value="Enter your name">
        <label>Location: </label>
        <input type="text" name="location" value="Enter your location">
        <button type="submit" name="save">Save</button>
    </form>
</body>
</html>