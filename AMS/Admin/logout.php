<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: Index.php"); // Redirecting To Home Page
}
?>