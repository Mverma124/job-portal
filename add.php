<?php
include_once('connection.php');

if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $number=$_POST['number'];
    $city=$_POST['city'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $sql   ="INSERT INTO `tbl_user`(`name`, `number`, `city`, `age`, `email`, `password`) VALUES ('$name','$number','$city','$age','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){ 
    header('location:null.php');
    echo"<script>alert('New User Register Success');</script>";   
    }else{
        die(mysqli_error($conn)) ;
    }
   
}
