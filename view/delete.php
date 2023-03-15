<?php 
require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');

$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $controller->delete($id);
    header("Location: http://localhost/tccmvc/view/studentlist.php");  
    exit();
}else {
    header("Location: http://localhost/tccmvc/index.php");  
    exit();
}
?>