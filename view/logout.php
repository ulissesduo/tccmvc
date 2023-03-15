<?php
session_start();
session_unset();
session_destroy();
header('Location: http://localhost/tccmvc/view/loginform.php');

?>