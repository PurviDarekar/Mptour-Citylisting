<?php
$message = filter_input(INPUT_POST, 'message');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');
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
$sql = "INSERT INTO contactus (message, name, email, subject)
values ('$message','$name','$email','$subject')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}

else{
echo "Error: ". $sql ."
". $conn->error;
}
header("refresh:0;url=contact.php");
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