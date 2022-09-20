<?php
session_start();

include_once 'connect.php';

$std_name = NULL;
$std_cgpa = null;
$std_achievement = null;
$std_technical_skills = null;
$std_area_of_interest = null;
$std_dob = null;
$std_email_id = null;
$std_phone_no = null;
$stud_eligible = "";
$std_roll = "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="Edit_student.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Admin.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">
    <div>
      <h1 style="text-align: center">Student Personal Details</h1> 
      <h4>Change the field you want to modify and click submit!!!</h4> 
    </div>

        <div class="filter_search">
        <form action="" method="post">
        <label for="stud_roll">Enter the Student's Roll No:</label>
        <input type="text" id="stud_roll" name="filter_roll" tabindex="1" autofocus="autofocus">
        <input type="submit" name="filter_submit" value="Get Values" style="width: 40%;margin-left: 85px">
        </form>
        </div>
  
        <?php 

        if(isset($_POST['filter_submit']))
        {
            $std_roll = $_POST['filter_roll'];

            $query = "select * from student where std_rollno= '".$std_roll."';";

            $std_result = mysqli_query($conn,$query);

            $row = mysqli_fetch_row($std_result);

            $std_name = $row[1];
            $std_cgpa = $row[2];
            $std_achievement = $row[3];
            $std_technical_skills = $row[4];
            $std_area_of_interest = $row[5];
            $std_dob = $row[6];
            $std_email_id = $row[7];
            $std_phone_no = $row[8];
            $query1 = "select std_eligibility from stu_eligibility where std_rollno='".$std_roll."';";
            $eligibility = mysqli_query($conn,$query1);

            $stud_eligible = "";

            while($eligi = mysqli_fetch_row($eligibility))
            {
                $stud_eligible.=$eligi[0];
                $stud_eligible.=";";
            }

            $stud_eligible = substr($stud_eligible, 0, -1);
        }
        ?>


         <form method="post" action="">
        <div>
            <label for="username">
              <span class="required">Name: *</span> 
              <input type="text" id="username" name="user_name" value = "<?php echo $std_name ?>" placeholder="Student's Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="phno">
              <span class="required">Phone No: *</span> 
              <input type="text" id="phno" name="user_phno" value="<?php echo $std_phone_no ?>" placeholder="Student's Phone No" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="cgpa">
              <span class="required">Current CGPA: *</span> 
              <input type="text" id="cgpa" name="user_cgpa" value="<?php echo $std_cgpa ?>" placeholder="Student's Current CGPA" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="std_DOB">
              <span class="required">DOB: *</span> 
              <input type="date" id="std_DOB" name="user_dob" value="<?php echo $std_dob ?>" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="stu_area">
              <span class="required">Area of Interest: *</span> 
              <input type="text" id="stu_area" name="user_area_of_interest" value="<?php echo $std_area_of_interest ?>" placeholder="Student's Area of Interest" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <div>
            <label for="stu_inher">
        <?php

          $ugresult = "SELECT no_of_cert_courses,std_department from ug_student where std_rollno ='".$std_roll."';";
          $pgresult = "SELECT no_of_research_papers,std_specialisation from pg_student where std_rollno ='".$std_roll."';";

          $result2 = mysqli_query($conn,$ugresult);
          $result3 = mysqli_query($conn,$pgresult);
          $no_of_res = 0;

          $count1 = mysqli_num_rows($result2);
          $count2 = mysqli_num_rows($result3);

          $ugrow = mysqli_fetch_array($result2);
          $pgrow = mysqli_fetch_array($result3);

          if($count1 > 0)
          {
             echo "<span class='required'>No of Certified Courses</span>";
             $no_of_res = $ugrow[0];
          }

          else if($count2 > 0)
          {
            echo "<span class='required'>No of Research Papers</span>";
            $no_of_res = $pgrow[0];
          }

        ?>
              <input type="text" id="stu_inher" name="no_of" value="<?php echo $no_of_res ?>" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <div>
            <label for="stu_eligible">
              <span class="required">Student's eligiblities (place a ; between Student's eligibilities): *</span> 
              <input type="text" id="stu_eligible" name="std_eligibility_" value="<?php echo $stud_eligible ?>" placeholder="Student's Eligibility" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <div>             
            <label for="stu_tech">
              <span class="required">Technical Skills: *</span> 
              <textarea type="text" rows="5" id="std_tech" name="std_technicalskills" placeholder="Please write Student's Technical Skills Here." required="required"><?php echo $std_technical_skills ?></textarea>
            </label>  
        </div>

        <div>             
            <label for="stu_achive">
              <span class="required">Achievements: *</span> 
              <textarea type="text" rows="5" id="std_achive" name="std_achivement" placeholder="Please write Student's Achievements Here." required="required"><?php echo $std_achievement ?></textarea>
            </label>  
        </div>
        <input type="hidden" value="<?php echo $std_roll ?>" name="pass_rollno">
        <div>              
            <button name="submitedit" type="submit" id="submit" >Update Table</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        $std_roll = $_POST['pass_rollno'];
        $dbusername = $_POST['user_name'];
        $dbphoneno = $_POST['user_phno'];
        $dbusercgpa = $_POST['user_cgpa'];
        $dbuserdob = $_POST['user_dob'];
        $dbuserdob = date("Y-m-d", strtotime($dbuserdob));
        $dbusertech = $_POST['std_technicalskills'];
        $dbuserachive = $_POST['std_achivement'];
        $dbuserinterest = $_POST['user_area_of_interest'];
        $dbeligibility = $_POST['std_eligibility_'];
        $number_of = $_POST['no_of'];

        $update = "UPDATE STUDENT SET STD_NAME='$dbusername',STD_PHONE_NO='$dbphoneno',STD_CGPA='$dbusercgpa',STD_DOB='$dbuserdob',STD_TECHNICAL_SKILLS='$dbusertech',STD_ACHIEVEMENT='$dbuserachive',STD_AREA_OF_INTEREST='$dbuserinterest' WHERE STD_ROLLNO='$std_roll';";

        $pieces = explode(";",$dbeligibility);

        $deleteq = "DELETE  FROM STU_ELIGIBILITY WHERE STD_ROLLNO = '".$std_roll."';";

        $temp = mysqli_query($conn,$deleteq);

        for($i=0;$i<count($pieces);$i++)
        {
            $update1 = "INSERT INTO STU_ELIGIBILITY VALUES('".$std_roll."','".$pieces[$i]."');";
            $temp1 = mysqli_query($conn,$update1);
        }

           $ugquery = "UPDATE UG_STUDENT SET NO_OF_CERT_COURSES = ".$number_of." where std_rollno = '".$std_roll."';";
           mysqli_query($conn,$ugquery);
          $pgquery = "UPDATE PG_STUDENT SET no_of_research_papers = ".$number_of." where std_rollno = '".$std_roll."';";
          mysqli_query($conn,$pgquery);

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