
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Author" content="Harsh Vardhan Ladha" />
<title>Captcha test</title>
<style type="text/css">
#change-image { font-size: 0.8em; }
</style>
</head>
<body onload="document.getElementById('email').focus()">

<br />
<span id="result" style="color:red;"><b>Invalid Captcha</b></span><br/>
<img src="captcha.php" id="captcha" /><br/>


<!-- CHANGE TEXT LINK -->
<a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
	document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/>
<input type="text" name="captcha" id="captcha-form" autocomplete="off" required /><br /><br />
</body>
</html>
