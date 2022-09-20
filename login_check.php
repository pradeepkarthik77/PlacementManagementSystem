<?php
include_once 'connect.php'; 
session_start();
if(isset($_POST['login-user']))
{ 
    session_start();
    $myemail = mysqli_real_escape_string($conn,$_POST['user_email']);
    $password_ = mysqli_real_escape_string($conn,$_POST['user_password']);
    $usertype = mysqli_real_escape_string($conn,$_POST['usertype']);
     
    $sql = "SELECT email_id FROM login WHERE email_id = '$myemail' and password_ = '$password_' and type_of_user = '$usertype'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    $_SESSION['login_user_email'] = $myemail;

    if($count == 1) 
    {
        if($usertype == "Admin")
        header("location: Admin.php");
        elseif ($usertype == "Student")
        header("location: Student.php");
        else if($usertype == "Faculty")
        header("location: Faculty.php");
     }
     else 
     {
        echo '<script type="text/javascript">
          window.onload = function () { alert("Invalid Credentials Try Again"); window.location="login.html"}</script>';
     }

     mysqli_close($conn);
}

?>