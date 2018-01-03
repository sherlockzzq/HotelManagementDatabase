<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';


$address = $_REQUEST["hotel"];
$room = $_REQUEST["room"];
$price = $_REQUEST["p"];
$roo = $_REQUEST["roo"];
$query = "SELECT * from Price WHERE RoomNumber = '$room' and HotelAddress = '$address'";

$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);

if (empty($tuple)){
	print "no such record";
}
else{
if (!is_numeric($price)){
	die("price should be numeric");
}
$newQuery = "UPDATE Price SET ActualPrice = '$price' WHERE RoomNumber = '$room' and HotelAddress = '$address'";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Update Price Successfully!");
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
