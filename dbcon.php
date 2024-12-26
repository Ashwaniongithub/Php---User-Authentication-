<?php 
define("HOSTNAME" , "localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","users");


$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(!$con){
    die("connection failed due to".mysqli_connect_error());
}else{
    // echo "connection done";
}
?>