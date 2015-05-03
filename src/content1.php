<?php

# content1.php - CS290, Emmalee Jones, Assignment 4.1
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

#Start or resume session
session_start();

#Test and action for accessing content1.php directly, send back to login page
if (!isset($_POST['userName']) && !isset($_SESSION['loggedIn'])) {
    $_SESSION = array();
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
    die();
}

#Test and action for login with no value for name
if (!isset($_POST['userName']) || $_POST['userName'] == null) {
    if (!isset($_SESSION['loggedIn'])) {
        echo "A username must be entered. 
	  Click" . " <a href ='login.php'>here</a>" . " to return to the"
          . " login screen.";
        session_destroy();
        die();
    }
}

#If first time user set SESSION userName
if (!isset($_SESSION['userName'])) {
    $_SESSION['userName'] = htmlspecialchars($_POST["userName"]);
}
#Set valid loggedIn after edits
$_SESSION['loggedIn'] = 0;
#If no previous visits to site set site to 0
if (!isset($_SESSION['visits_count1'])) {
    $_SESSION['visits_count1'] = 0;
}

#Send message to screen with current userName and number of visits
#Include way back to login page
echo "Hello " . $_SESSION['userName'] . ", you have visited this page " . 
  $_SESSION['visits_count1'] . " times before. Click " . " <a "
  . "href ='content1.php?log_out=true'>here</a>" . " to log_out.<br>";
echo "<br>Please click " . "<a href ='content2.php'>here</a>" . " to direct"
  . " you to content2.php page.\n";

#Increment number of visits for content1.php
$_SESSION['visits_count1'] ++;

#Test and action for user returning to login page
if (isset($_GET['log_out'])) {
    $_SESSION = array();
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
    die();
}
?>
