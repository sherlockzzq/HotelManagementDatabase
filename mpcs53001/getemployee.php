<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

// Get the price of the hotel for the datetime given.
$query = "SELECT * FROM Employee";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));


print "we have the following employees: <br>";
print '<table border = "4">';
print '<tr>';
print '<td> Name </td> ';
while($tuple = mysqli_fetch_array($result)){	

	print '<tr>';
	printf("<td>%s</td>",$tuple['Name']);
	print '</tr>';
}
print '</table>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
