
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
<?php
require ('partials/nav.php');
include('dbcon.php') ;
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["uname"];
    $password=$_POST["password"];

    $sql="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' ";
    $result=mysqli_query($con , $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location:welcome.php");
    }
    else{
        $showerror=true;
    } 
}

?>
   <h1 class="text-center"> Login </h1>
    
    <div class="container">
        <?php
        if($showerror){
            echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               Oh shit bro username and password doest matched 
            </div>
            </div>

            ';
        } 
        ?>

        <?php
        
        ?>
    
   
    <div class="container d-flex justify-content-center">
    <form method="post" action="login.php" class="col-md-6 mt-4">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>