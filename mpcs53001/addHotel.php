<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];
$ZipCode = $_REQUEST["birthday"];

if ($address == NULL){
	print("You must print hotel address!");
}
else{
$query = "SELECT * from Hotel WHERE HotelAddress = '$address' ";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	$newQuery = "INSERT INTO Hotel (HotelAddress, Name, ContactNumber, ZipCode) VALUES ('$address', '$name', '$phone', '$ZipCode')";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Add Successfully!");
	print('<p style = "text-align: left; color: black">Click <a href = "findhotel.php" style = "color: aqua;">here</a> to get all the hotel in our database.</p>');
}
else{
print "The Hotel Already exists";

}

}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 