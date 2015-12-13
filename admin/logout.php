<?php
session_start();
unset($_SESSION['nits_rec_admin']);
session_destroy();
header("location:index.php");
?>