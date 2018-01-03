<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$target = $_REQUEST["target"];

$query = "SELECT HotelAddress, RoomNumber, ActualPrice FROM Price where ActualPrice > '$target'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));


print '<table border = "2">';
print '<tr>';
print '<td>HotelAddress</td> <td> RoomNumber </td> <td> Price </td> ';
while($tuple = mysqli_fetch_array($result)){	

	print '<tr>';
	printf("<td>%s</td> <td>%s</td> <td>%s</td>", $tuple['HotelAddress'], $tuple['RoomNumber'], $tuple['ActualPrice']);
	print '</tr>';
}
print '</table>';
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
