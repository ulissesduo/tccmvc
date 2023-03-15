<?php
require_once('C:\xampp\htdocs\tccmvc\model\model.php');
require_once('C:\xampp\htdocs\tccmvc\controller\controller.php');
require_once('C:\xampp\htdocs\tccmvc\config\config.php');


$db = new db();
$pdo = $db->connection();

$searchModel = new Model($pdo);
$controller = new Controller($searchModel);

// Check if form is submitted
if (isset($_POST['searchTerm'])) {
    $data = $searchModel->search($_POST['searchTerm']);    
}
else {
    $data = $searchModel->selectStudent();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Student List</title>
</head>
<body>
    <h1 class="container">My students</h1>
    
    <div class="container">
    <a href="http://localhost/tccmvc/view/addstudent.php" class="btn btn-primary">Add New Student</a>
    <form method="post" action="studentlist.php">
        <input type="text" name="searchTerm" placeholder="Search...">
        <button type="submit">Search</button>
        <a href='http://localhost/tccmvc/view/teacherpage.php?id=' . $userid>Cancel </a>
       
    </form>


    <table class="table ">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Payment</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
            
            </tr>
        </thead>
        <tbody>            
            </tr>
            <?php foreach($data as $row): ?>
                <tr>
                <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['payment'] == 1 ? 'Paid' : 'Pending'?></td>
                    <td><?= $row['isActive'] == 1 ? 'Active' : 'Inactive' ?></td>
                    <td>
                        <a class="btn btn-primary" href="http://localhost/tccmvc/view/editStudent.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a class="btn btn-danger" href="http://localhost/tccmvc/view/deleteConfirm.php?id=<?php echo $row['id']; ?>">Delete</a> |
                        <a class="btn btn-primary" href="http://localhost/tccmvc/view/confirmactive.php?id=<?php echo $row['id']; ?>">Inactive/Active</a>
                        
                    </td>
                </tr>
                <?php endforeach; ?>

        </tbody>
        </table>
    </div>

</body>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</html>