<?php
include("configure.php");

if(isset($_POST['login'])){
    $matric=$_POST['matric'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sel="SELECT * FROM student WHERE email='$email' AND password='$password'";
    $res=$conn->query($sel);
    if($res->num_rows >0){
        while($row=$res->fetch_assoc()){
            $_SESSION['id']=$row['id'];
            $_SESSION['firstname']=$row['firstname'];
            $_SESSION['lastname']=$row['lastname'];
            $_SESSION['username']=$row['username'];
            $_SESSION['matric']=$row['matric'];
            $_SESSION['email']=$row['email'];
            $_SESSION['success']="Login successful";
            header("location:dashboard.php");
        }    
    }
    else{
        echo "<script>alert('username password does not exist')</script>";
        header("refresh:1;login.php");
    }
}
?>