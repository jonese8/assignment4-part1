<?php

#loopback.php - CS290, Emmalee Jones, Assignment 4.1
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');
$Method = $_SERVER['REQUEST_METHOD'];
$Array_Status = "no_data";
#Receive an array of data from GET or POST
if ($Method === "POST") {
    $Parameters = $_POST;
} else if ($Method === "GET") {
    $Parameters = $_GET;
}
#Test for blank valid value, set to undefined
foreach ($Parameters as $key => $val) {
    $Array_Status = "data";
    if (empty($val)) {
        $Parameters[$key] = "undefined";
    }
}
#Set array to null if missing values or array empty
if ($Array_Status == "no_data") {
    $Parameters = null;
}
#Parse out array for JSON echo
$Pairs_Array = ['Type' => $Method,
    'parameters' => $Parameters
];
echo json_encode($Pairs_Array);
?>

