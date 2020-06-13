<?php
include("configure.php");
$id=0;

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $matric=$_POST['matric'];
    $email=$_POST['email'];

    $update="UPDATE student SET firstname='$firstname',lastname='$lastname',username='$username',matric='$matric',email='$email' WHERE id=$id";
   $result=$conn->query($update);
   if($result->num_rows >0){
      
        while($row=$result->fetch_assoc()){
            $_SESSION['id']=$row['id'];
            $_SESSION['firstname']=$row['firstname'];
            $_SESSION['lastname']=$row['lastname'];
            $_SESSION['username']=$row['username'];
             $_SESSION['matric']=$row['matric'];
            $_SESSION['email']=$row['email'];
            
            header("location:dashboard.php");
        }
    }
    else{
        echo "Profile update failed";
        header("refresh:1;dashboard.php");
    }
}
?>