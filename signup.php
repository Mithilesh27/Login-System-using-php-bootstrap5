<?php

$exists=false;
$existAlert= false;


if ($_SERVER["REQUEST_METHOD"]=="POST") {

    include 'partials/_dbconn.php';

    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $existSql = "SELECT * FROM `users` WHERE username='$username'";
    $result=mysqli_query($conn, $existSql);
    $numExistRows= mysqli_num_rows($result); 

if($numExistRows>0){

    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error !! </strong> Username Already Exists
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";



}else{ 
    if($password==$cpassword){
        $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', current_timestamp())";
        
        $result= mysqli_query($conn, $sql);
        
        if($result){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success</strong>Your account created Successfully ! Login to continue
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";
            
            }
        }else{
            $existAlert=true;
        }
    
    }


}


?>



<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Signup-TechyTech</title>
</head>

<body>
    <?php  require 'partials/_navbar.php';
    //require 'partials/_dbconn.php';
    ?>

    <?php
if($existAlert){
    echo "'<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Success</strong>Passwords do not match
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>'";
};
    
?>





    <div class="container w-50 ">

        <h1 class="">Signup to Techytech</h1>
        <form method="POST" action="signup.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" required id="username" aria-describedby="emailHelp"
                    name="username">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required name="password">
            </div>

            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" required name="cpassword">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Signup</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>