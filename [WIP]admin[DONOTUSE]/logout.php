<?php

// Inialize session
session_save_path('phpsessions');
session_start();

// Delete certain session
unset($_SESSION['username']);

// Delete all session variables
session_destroy();

// Jump to login page
       header('refresh:5;url=index.php');
		echo '<center><b>Logged Out Succesfully,</b></br>You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.</center>';


?>
