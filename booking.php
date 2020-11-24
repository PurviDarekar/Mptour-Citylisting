<?php

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$persons = filter_input(INPUT_POST, 'persons');
$rooms = filter_input(INPUT_POST, 'rooms');
$arrdate = filter_input(INPUT_POST, 'arrdate');
$deptdate = filter_input(INPUT_POST, 'deptdate');
$place = filter_input(INPUT_POST, 'place');
if (!empty($name)){
if (!empty($email)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "pro";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO bookings ( name, email, persons, rooms, arrdate, deptdate, place)
values ('$name','$email','$persons','$rooms','$arrdate','$deptdate','$place')";
if ($conn->query($sql)){
echo "booked...";
}

else{
echo "Error: ". $sql ."
". $conn->error;
}
header("refresh:0;url=listing_details.php");
$conn->close();
}
}
else{
echo "comment should not be empty";
die();
}
}
else{
echo "name should not be empty";

die();
}
?>