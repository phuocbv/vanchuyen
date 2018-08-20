<?php
ob_start();
session_start();
unset ($SESSION['user_name']);
session_destroy();
header('Location: ../index');
ob_end_flush();	
?>
