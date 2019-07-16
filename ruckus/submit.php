<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "captive", "YourCaptiveUserPassword", "captive_data");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$emails = mysqli_real_escape_string($link, $_REQUEST['emails']);
$mac = mysqli_real_escape_string($link, $_REQUEST['mac']);

// attempt insert query execution
$sql = "INSERT INTO users (emails, mac) VALUES ('$emails', '$mac')";
if(mysqli_query($link, $sql)){
   echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>

