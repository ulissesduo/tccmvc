<?php
require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');


$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

if (isset($_POST['create'])) {
    $name = $_POST['nome'];
    $controller->create($name);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form action="http://localhost/tccmvc/view/addStudent.php" method="POST">
        <input type="text" name="nome">
        <div>
            <input type="submit" name="create" value="Submit">
            <a href="http://localhost/tccmvc/view/studentlist.php">Cancel</a><!--Preciso colocar o id do prof que acessou essa pagina para voltar com o id certo? -->
        </div>
    </form>
</body>
</html>
