<?php
include "h.conn.php";
session_start();
unset($_SESSION['reg_id']);
session_destroy();
header("location:index.php");
?>