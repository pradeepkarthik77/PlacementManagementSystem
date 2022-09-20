<?php
session_start();
$admin_id = $_SESSION['user_id'];

include_once 'connect.php';

$query = "SELECT ADMIN_PHONE_NO FROM ADMINISTRATOR WHERE ADMIN_ID = '$admin_id';";
$phoneres = mysqli_query($conn,$query);
$row = mysqli_fetch_row($phoneres);
$admin_phno = $row[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
    <link rel="stylesheet" href="student_personal_details.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Admin.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">
    <div>
      <h1 style="text-align: center">Make an Announcement</h1> 
      <h4>Enter your Announcement and click submit!!!</h4> 
    </div>
  
         <form method="post" action="">
        <div>
            <label for="date_of">
              <span class="required">Date of Announcement: *</span> 
              <input type="date" id="date_of" name="std_dob" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>             
            <label for="announce">
              <span class="required">Announcement: *</span> 
              <textarea type="text" rows="5" id="announce" name="announcement_msg" placeholder="Please write your Announcement Here." required="required"></textarea>
            </label>  
        </div>
        <div>              
            <button name="submitedit" type="submit" id="submit" >Announce</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        $dbdate = $_POST['std_dob'];
        $dbdata = date("Y-m-d", strtotime($dbdate));
        $message = $_POST['announcement_msg'];

        $update = "INSERT INTO ANNOUNCEMENT VALUES('$admin_id','$admin_phno','$dbdata','$message')";

        if (mysqli_query($conn,$update)) 
        {
          echo "<script>window.alert('Records Updates Successfully!!!');window.location.href='Admin.php';</script>";
        }
         else 
        {
          echo "<script>window.alert('Records Update Failed'); window.location.href='Admin.php';</script>";
        }
    }
    ?>
</body>
</html>