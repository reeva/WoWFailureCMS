<html>

<head>
<title>Admin Login Page</title>
<link rel="stylesheet" type="text/css" href="../wow/static/login/static/_themes/bam/css/master.css?v1"/>
		
</head>

<body style="background-image:url(../wow/static/images/layout/bg-top-man.jpg);"><center>
<?php session_save_path('phpsessions'); ?>
<h3><b><u>Admin Login Panel</u></b></h3>

<table border="0">
<form method="POST" action="loginproc.php">
<tr><td><b>Username</b></td><td>:</td><td><input type="text" name="username" size="20"></td></tr>
<tr><td><b>Password</b></td><td>:</td><td><input type="password" name="password" autocomplete="off" size="20"></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Login"></td></tr>
</form>
</table>

</center></body>
<br><br><center><img src="../wow/static/images/logos/wof-logo.png" alt="Logo"/></center>
</html>