<?php
include_once 'connect.php'; 
if(isset($_POST['signup_user']))
{    
     $email_id = $_POST['register_email'];
     $password_ = $_POST['register_password'];
     $usertype = $_POST['reg_usertype'];
     $sql = "INSERT INTO login (email_id,password_,type_of_user)
     VALUES ('$email_id','$password_','$usertype')";
     if (mysqli_query($conn, $sql)) 
     {
        echo '<script type="text/javascript">
          window.onload = function () { alert("Sign Up Successfull! Now you can Login!"); window.location="login.html"}</script>';
     } 
     else 
     {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Invalid Credentials Try Again"); window.location="login.html"}</script>';
     }
     mysqli_close($conn);
}
?>