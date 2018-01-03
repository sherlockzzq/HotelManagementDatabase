<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$Hoteladdress = $_REQUEST["hotel"];
$department = $_REQUEST["department"];
$No = $_REQUEST["No"];
$name = $_REQUEST["name"];
$salary = $_REQUEST["salary"];
$address = $_REQUEST["address"];
$birthday = $_REQUEST["birthday"];
if ($Hoteladdress == NULL){
	print("You must type in hotel address!");
}
else if ($department == NULL){
	print("You must type in department");
}
else if ($No == NULL){
	print("You must type in Employee Number");
}
else if (!is_numeric($salary)){
	print("please enter the right number for salary!");
}
else{
$query = "SELECT * from Employee WHERE HotelAddress = '$Hoteladdress' and DepartmentName = '$department' and EmployeeNo = '$No'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	$newQuery = "INSERT INTO Employee (HotelAddress, DepartmentName, EmployeeNo, Name, Salary, Address, Birthday) VALUES ('$Hoteladdress', '$department', '$No', '$name', '$salary', '$address', '$birthday')";
	mysqli_query($dbcon, $newQuery) or die('Query failed:'.mysqli_error($dbcon));
	print("Add Employee Successfully!");
	

	print('<p style = "text-align: left; color: black">Click <a href = "getemployee.php" style = "color: aqua;">here</a> to get all the customer in our database.</p>');
	

}
else{
print "Your information Already exists";
}

}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
