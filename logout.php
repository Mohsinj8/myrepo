<?php
include('./database.php'); 

unset($_SESSION['User']);

header('Location:login.php');
exit;
?>