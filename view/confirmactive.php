<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status change Confirmation</title>
</head>
<body>
    <h1>Status change Confirmation</h1>
    <p>Are you sure you want to delete the following student?</p>

    <form action="inactive.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" name="confirm" value="Confirm">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    <p><?php echo $_GET['id'];?></p>
</body>
</html>