<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');


$db = new db();
$pdo = $db->connection();

$model = new Model($pdo);
$controller = new Controller($model);

$id = '';
$name = '';

if (isset($_GET['id']) && isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nome'];
    $id = $_POST['id'];

    $controller->update($id, $name);
    header("Location: http://localhost/tccmvc/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="editStudent.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $name; ?>" />

        <div>
            <input type="submit" name="update" value="Submit">
            <input type="button" value="Cancel">
        </div>
    </form>
</body>
</html>
