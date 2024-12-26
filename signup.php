
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
$showalert=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["uname"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    // to check usrname alredy exist on not
    $existsql="select * from `user` where username='$username'";
    $result=mysqli_query($con , $existsql);
    $numexistrow=mysqli_num_rows($result);
    if($numexistrow>0){
        $showerror="username alredy exist";
    }else{

        if(!empty($username) && !empty($password) && $password === $cpassword) {
            $sql="INSERT INTO `user` ( `username`, `password`, `date`) VALUES ( '$username', '$password', current_timestamp());";
            $result=mysqli_query($con , $sql);
            $showalert=true;
        }else{
            $showerror="password do not match";
        }
    }
}

?>
   <h1 class="text-center"> signup </h1>
    
    <div class="container">
        <?php
        if($showalert){
            echo'
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Hurray , Your Account Is Created successfully!!!!
                now login and enjoy
                <a href="login.php">login</a> 
            </div>
            ';
        } ;

        if($showerror){
            echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Oh ho ...'.$showerror.'
            </div>
            </div>

            ';
        } 
        ?>

        <?php
        
        ?>
    
   
    <div class="container d-flex justify-content-center">
    <form method="post" action="signup.php" class="col-md-6 mt-4">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>