<?php

error_reporting(0);

session_start();

if($_SESSION['name']){
    header('Location: about.php');
    exit;
}

$conn = mysqli_connect("localhost","root","","pro");

if(!$conn){
    die('error connecting to database');
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email ='$email' and password='$password'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($result);
    
    if($result){
        $_SESSION['name']=$result['name'];
        $_SESSION['email']=$result['email'];
        header('Location: index.php');
    }else{
        echo('<h3 style="color:red"><center>Invalid email/password</center></h3>');
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

    <title>Login</title>
</head>

<body>
    <center>
   
        <div style="margin-top:200px;width:40%;min-width:400px;text-align:left;border-width:1px;border-style:solid;border-radius:5px;background-image: url('assets/img/gallery/ok.png');">
            <form style="margin:20px" method="POST">
                <h2>
                    Login
                </h2><br>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" name="email" required class="form-control" id="inputEmail">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" required class="form-control" id="inputPassword">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
           <center> <button onclick="window.location= ('register.php')" name="submit" class="btn btn-danger">Register or SignUp</button></center>
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
