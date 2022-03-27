<?php

$exists=false;
$showError= false;
$login=false;

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    include 'partials/_dbconn.php';

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `users` WHERE username='$username' AND password= '$password'";
    $result= mysqli_query($conn, $sql);
    
    $num=mysqli_num_rows($result);


    if($num==1){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: welcome.php ");

    }else{
        $showError=true;
    }


}


?>





<!doctype html>
<html lang="en">

<!-- INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES (NULL, 'abc', 'abc', current_timestamp()); -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login-TechyTech</title>
</head>

<body>
    <?php  require 'partials/_navbar.php';
    
    

    if($login){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success</strong>You are Logged in.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

    if($showError){

    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error   !!</strong> Invalid Credentials
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    };


    ?>



    <div class="container w-50 my-5">

        <h1 class="my-3">Login to Techytech</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" name="Submit" class="btn btn-primary">Login</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>