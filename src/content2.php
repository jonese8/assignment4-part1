<?php

# content2.php - CS290, Emmalee Jones, Assignment 4.1
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

#Start or resume session
session_start();

#Test and action for accessing content2.php directly, send back to login page
if (!isset($_SESSION['loggedIn'])) {
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
}

#If no previous visits to site set site to 0
if (!isset($_SESSION['visits_count2'])) {
    $_SESSION['visits_count2'] = 0;
}

#Send message to screen with current userName and number of visits
#Include way back to login page
echo "Hello " . $_SESSION['userName'] . ", you have visited this page " 
  .$_SESSION['visits_count2'] . " times before. <br><br>";
echo "Click " . "<a href ='content1.php'>here</a>" . " to go back to"
  . " content1.php page.";

#Increment number of visits
$_SESSION['visits_count2'] ++;
?> 

