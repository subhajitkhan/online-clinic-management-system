<?php
session_start();
unset($_SESSION['docname']);
session_destroy();
header("Location:home.html");
?>