<?php
session_start();
$admin_id = $_SESSION['user_id'];
include_once 'connect.php';
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
      <h1 style="text-align: center">Enter Feedback</h1> 
      <h4>Enter your Feedback and click Update!!!</h4> 
    </div>
  
         <form method="post" action="">

        <div>
        <label for= "fd_id">
        <span class="required">Enter Feedback_id: *</span>
        <input id="fd_id" name="feed_id" required="required" tabindex="1" autofocus="autofocus" placeholder="Enter Feedback ID here" />
        </label>    
        </div>

        <div>
        <label for= "cmpy_id">
        <span class="required">Enter Company ID: *</span>
        <input id="cmpy_id" name="cmp_id" required="required" tabindex="1" autofocus="autofocus" placeholder="Enter Company ID here" />
        </label>    
        </div>

        <div>             
            <label for="feed_desc">
              <span class="required">Feedback Message: *</span> 
              <textarea type="text" rows="5" id="feed_desc" name="feedback_msg" placeholder="Please Enter your Feedback Here." required="required"></textarea>
            </label> 
        </div>

        <div>
        <label for= "stud_knowl">
        <span class="required">Enter Rating for student Knowledge(Out of 5.0): *</span>
        <input id="stud_knowl" name="std_knowledge" required="required" tabindex="1" autofocus="autofocus"/>
        </label>    

        <label for= "stud_behaviour">
        <span class="required">Enter Rating for student Behaviour(Out of 5.0): *</span>
        <input id="stud_behaviour" name="std_behaviour" required="required" tabindex="1" autofocus="autofocus"/>
        </label>  
    
        <label for= "over_rat">
        <span class="required">Enter Your Overall Placement Experience(Out of 5.0): *</span>
        <input id="over_rat" name="overall_rating" required="required" tabindex="1" autofocus="autofocus"/>
        </label>  
        </div>  

        <div>              
            <button name="submitedit" type="submit" id="submit" >Give Feedback</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        $feed_id = $_POST['feed_id'];
        $cmp_id = $_POST['cmp_id'];
        $message = $_POST['feedback_msg'];
        $stu_know = $_POST['std_knowledge'];
        $std_behaviour = $_POST['std_behaviour'];
        $overall = $_POST['overall_rating'];

        $update = "INSERT INTO FEEDBACK VALUES($feed_id,$cmp_id,'$message',$stu_know,$std_behaviour,$overall)";

        if (mysqli_query($conn,$update)) 
        {
          echo "<script>window.alert('Records Updates Successfully!!!');window.location.href='Admin.php';</script>";
        }
         else 
        {
          echo "<script>window.alert('Records Update Failed.Enter a Unique Feedback ID'); window.location.href='Admin.php';</script>";
        }
    }
    ?>
</body>
</html>