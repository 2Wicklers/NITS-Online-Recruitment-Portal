<?php
include "h.conn.php";
session_start();
unset($_SESSION['reg_id_nf']);
header("location:index.php");
?>