<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$SSN = $_REQUEST["SSN"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];
$birthday = $_REQUEST["birthday"];
$query = "SELECT * from Customer WHERE SSN = '$SSN'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
if ($SSN == NULL){
	print("please enter SSN ");
}
else{
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "no such record";
}
else{
$newQuery = "UPDATE Customer SET PhoneNumber = '$phone',  Address = '$address',  Birthday = '$birthday' WHERE SSN = '$SSN' ";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Update Successfully!");
	print('<p style = "text-align: left; color: black">Click <a href = "getcustomer.php" style = "color: aqua;">here</a> to get all the customer in our database.</p>');
}
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
