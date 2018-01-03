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
$name = $_REQUEST["name"];
$phone = $_REQUEST["num"];
$address = $_REQUEST["address"];
$birthday = $_REQUEST["birthday"];
$regex = '#\b[0-9]{3}-[0-9]{2}-[0-9]{4}\b#';
if ($SSN == NULL){
	print("please enter SSN ");
}
else if(!preg_match($regex, $SSN)){
	print("please type in the right format for SSN");
}
else{
$query = "SELECT * from Customer WHERE SSN = '$SSN'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	$newQuery = "INSERT INTO Customer (SSN, Name, PhoneNumber, Address, Birthday) VALUES ('$SSN', '$name', '$phone', '$address', '$birthday')";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Add Customer Successfully!");

		print('<p style = "text-align: left; color: black">Click <a href = "getcustomer.php" style = "color: aqua;">here</a> to get all the customer in our database.</p>');
	
}
else{
print "$name information Already exists";
}

}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
