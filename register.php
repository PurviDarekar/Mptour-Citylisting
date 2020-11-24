<?php

error_reporting(0);

session_start();

if($_SESSION['name']){
    header('Location: index.php');
    exit;
}

$conn = mysqli_connect("localhost","root","","pro");

if(!$conn){
    die('error connecting to database');
}

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "insert into users (name,email,mobile,password) values ('$name','$email','$mobile','$password')";
    if(mysqli_query($conn,$sql)){
        header("Location: login.php");
    }else{
        echo('<h3 style="color:red"><center>An error occurred while registering</center></h3>');
    }
}
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Register</title>
</head>
<style>h2{color:white};label{color:white;}</style>
<body>
    <center>
    <div style="margin-top:200px;width:40%;min-width:400px;text-align:left;border-width:1px;border-style:solid;border-radius:5px;background-image: url('assets/img/gallery/yolo4.jpg');">
            <form style="margin:20px" method="POST">
                <h2>
                    Create Account
                </h2><br>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" required class="form-control" id="inputName">
                    
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" name="email" required class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="inputNumber">Mobile Number</label>
                    <input type="number" name="mobile" required class="form-control" id="inputNumber">
                    
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" required class="form-control" id="inputPassword">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </form>
           <center> <button onclick="window.location= ('login.php')" name="submit" class="btn btn-danger">Already have an account?</button></center>
        </div>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>