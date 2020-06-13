<?php
session_start();
ob_start();
$servername="localhost";
$dbusername="id12585945_root";
$dbpassword="";
$dbname="id12585945_";

$conn=new mysqli($servername,$dbusername,$dbpassword,$dbname);
if($conn->connect_error){
    die("connection failed" .$conn->connect_error);
}
else{
    echo "connection successful";
}

if(isset($_POST['submit'])){
    $firstname=$_POST['firstname']
    $lastname=$_POST['lastname']
    $username=$_POST['username']
    $matric=$_POST['matric']
    $email=$_POST['email']
    $password=$_POST['password']
    $password2=$_POST['password2']

    if($password!=$password2){
        echo "password mismatched";
        die(header("refresh:1;index.php"));
    }

    $confirmemail="SELECT * FROM student WHERE email='$email' AND password='$password'";
    $result=$conn->query($confirmemail);
    if($result->num_rows >0){
        echo "Email has been used by another user";
        header("refresh:1;index.php");
    }

    else{
        $insert="INSERT INTO student VALUES(NULL,'$firstname','$lastname','$username','$matric','$email','$password',NULL)";
        $res=$conn->query($insert);
        if($res==TRUE){
            echo "Registration successful";
            header("refresh:1;login.php");
        }
        else{
            echo "Registration failed";
            header("refresh:1;index.php");
        }
    }
}
?>