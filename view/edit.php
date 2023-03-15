<?php
require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);
// $teste = $controller->index();
// print_r($teste);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['nome'];
    // echo "id: $id\n";

    $controller->update($id, $name);
    header("Location: http://localhost/tccmvc/index.php");
    exit();
}
?>
