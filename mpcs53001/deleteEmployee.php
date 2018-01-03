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
$query = "SELECT * from Employee WHERE EmployeeNo = '$SSN'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "Sorry we don't have your records";
}
else{
$newQuery = "Delete from Employee where EmployeeNo = '$SSN'";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Quick Successfully!");
	print('<p style = "text-align: left; color: black">Click <a href = "getemployee.php" style = "color: aqua;">here</a> to get all the customer in our database.</p>');
}




// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
