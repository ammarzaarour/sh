<?php
session_start();
unset($_SESSION['a_id']);
header("Location: ../../index.php");
?>