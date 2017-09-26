<?php
session_start();
unset($_SESSION['patname']);
session_destroy();
header("Location:home.html");
?>