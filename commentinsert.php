<?php
$comment = filter_input(INPUT_POST, 'comment');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$website = filter_input(INPUT_POST, 'website');
if (!empty($name)){
if (!empty($comment)){
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
$sql = "INSERT INTO comments (comment, name, email, website)
values ('$comment','$name','$email','$website')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}

else{
echo "Error: ". $sql ."
". $conn->error;
}
header("refresh:0;url=blog_details.php");
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