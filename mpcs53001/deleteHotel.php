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
$query = "SELECT * from Hotel WHERE HotelAddress = '$address'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "This hotel does not exists in our record";
}
else{
$newQuery = "Delete from Hotel where HotelAddress = '$address'";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Terminate Successfully!");
	print('<p style = "text-align: left; color: black">Click <a href = "gethotel.php" style = "color: aqua;">here</a> to get all the hotel in our database.</p>');
}




// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
