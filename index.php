<?php
require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <a href='http:\\localhost\tccmvc\view\addStudent.php'>Add new User</a>    
    <form action="http:\\localhost\tccmvc\index.php" method="get">
        <input type="text" name="q" placeholder="Search...">
        <button type="submit" name='search'>Search</button>
    </form>

    <?php

        $controller->index();
    
    ?>
</body>
</html>