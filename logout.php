<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user"]);
session_destroy();
header('Location: ./login.php');
?>