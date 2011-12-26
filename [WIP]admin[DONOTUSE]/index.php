<html>

<head>
<title>Admin Login Page</title>
</head>

<body><center>
<?php session_save_path('phpsessions'); ?>
<h3><b><u>Admin Login Panel</u></b></h3>

<table border="0">
<form method="POST" action="loginproc.php">
<tr><td><b>Username</b></td><td>:</td><td><input type="text" name="username" size="20"></td></tr>
<tr><td><b>Password</b></td><td>:</td><td><input type="password" name="password" size="20"></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Login"></td></tr>
</form>
</table>

</center></body>

</html>