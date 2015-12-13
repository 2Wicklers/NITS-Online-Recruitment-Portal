<!Doctype html>
<?php
session_start();
if(isset($_SESSION['nits_rec_admin']))
{
?>

<html>
  <head>
  <title>Admin Home</title>
  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="main.js"></script>
  </head>
  
  <body>
  <form action="list.php" method="post">
  <select name="type" id="type">
  <option value="">Recruitment Type</option>
  <option value="faculty" id="faculty">Faculty
  <option value="non-faculty">Non-Faculty
  </select>
  &nbsp;
  <select id="department" name="department">
  <option value="">Select Department</option>
  </select>
  &nbsp;
  <select name="position" id="position">
  <option value="">Select Position</option>
  </select>&nbsp;
  <select name="status" id="status">
  <option value="">Status of the form</option>
  <option value="locked" selected>Locked</option>
  <option value="unlocked">Not Locked</option>
  </select>
  &nbsp;
  <a href="logout.php">LOGOUT</a>
  <div id="div">
  </div>
  </form>
  </body>
</html>  

<?php
}
else
{
	header("location:index.php");
}
?>