<?php
session_start();
$std_roll = $_SESSION['user_rollno'];

include_once 'connect.php';

$query = "select * from placement where std_rollno= '".$std_roll."';";

$std_result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($std_result);

$std_name = $row[1];
$std_placed = $row[2];
$std_cmp_id = $row[3];
$std_salary = $row[4];
$std_job_desc = $row[5];
$std_benefits = $row[6];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Placement Details</title>
    <link rel="stylesheet" href="student_placement_details.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Student.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">
    <div>
      <h1 style="text-align: center">Student Placement Details</h1> 
      <h4>Change the field you want to modify and click submit!!!</h4> 
    </div>
         <form method="post" action="">
        <div>
            <label for="username">
              <span class="required">Name: *</span> 
              <input type="text" id="username" name="user_name" value = "<?php echo $std_name ?>" placeholder="Your Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="Placed_">
            <span class="required">Placed?(yes/no): </span>     
        <input list="placed__" name="std_placed" placeholder="Type of user" value="<?php echo $std_placed ?>">
        <datalist id="placed__">
          <option value="yes">
          <option value="no">
        </datalist>
            </label> 
        </div>

        <div>
            <label for="placed_id">
              <span class="required">Placed Company Id: </span> 
              <input type="text" id="placed_id" name="user_placed_id" value="<?php echo $std_cmp_id ?>" placeholder="Enter the Id of your placed company id" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="std_salary">
              <span class="required">Salary Package (Enter CTC): </span> 
              <input type="text" id="std_salary" name="user_salary" value="<?php echo $std_salary ?>" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="stu_job_desc">
              <span class="required">Job Description: </span> 
              <input type="text" id="stu_job_desc" name="std_job_description" value="<?php echo $std_job_desc ?>" placeholder="Enter your Job Description" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <div>
            <label for="stu_benefits">
              <span class="required">Job Benefits: </span> 
              <input type="text" id="stu_benefits" name="std_benefits" value="<?php echo $std_benefits ?>" placeholder="Your Job Benefits" tabindex="1" autofocus="autofocus" />
            </label> 
        </div> 

        <div>              
            <button name="submitedit" type="submit" id="submit" >Update Table</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        $dbusername = $_POST['user_name'];
        $dbplaced = $_POST['std_placed'];
        $dbusercmpid = $_POST['user_placed_id'];
        $dbusersalary = $_POST['user_salary'];
        $dbuserjob = $_POST['std_job_description'];
        $dbuserbenefits = $_POST['std_benefits'];

        $update = "UPDATE PLACEMENT SET STD_NAME='$dbusername',PLACED='$dbplaced',PLACED_CMP_ID='$dbusercmpid',SALARY_PACKAGE='$dbusersalary',JOB_DESCRIPTION='$dbuserjob',BENEFITS='$dbuserbenefits' WHERE STD_ROLLNO='$std_roll';";

          if (mysqli_query($conn,$update)) 
          {
            echo "<script>window.alert('Records Updates Successfully!!!'); window.location.href='Student.php';</script>";
          }
          else 
          {
            echo "<script>window.alert('Records Update Failed'); window.location.href='Student.php';</script>";
          }
        if($dbplaced=='no')
        {
           $update1 = "CALL change_no;"; 
           if (mysqli_query($conn,$update1)) 
          {
            echo "<script>window.alert('Records Updates Successfully!!!'); window.location.href='Student.php';</script>";
          }
          else 
          {
            echo "<script>window.alert('Records Update Failed'); window.location.href='Student.php';</script>";
          }
        }

    }
    ?>

</body>
</html>