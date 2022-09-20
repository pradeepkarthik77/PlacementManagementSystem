<?php 
session_start();
$std_roll = $_SESSION['user_rollno'];
include_once 'connect.php';
$query = "select * from student where std_rollno='".$std_roll."';";
$std_result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Student</title>
<link rel="stylesheet" href="Student_personal_view.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Student.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <div class="wrapper">
    <?php
        $html = "<table class='htmltable'>";

        $query1 = "select std_eligibility from stu_eligibility where std_rollno='".$std_roll."';";
        $eligibility = mysqli_query($conn,$query1);
        $stud_eligible = "";
    
        while($eligi = mysqli_fetch_row($eligibility))
        {
            $stud_eligible.=$eligi[0];
            $stud_eligible.=",";
        }
        $stud_eligible = substr($stud_eligible, 0, -1);

        $html.="<tr> <th>Roll No</th> <th>Name</th> <th>CGPA</th> <th>Achievement</th> <th>Technical Skills</th> <th>Area of Interest</th> <th>DOB</th> <th>Email_id</th> <th>Phone no</th> <th>Batch</th> <th>Eligibility</th> <th>No of Courses/Reserach Papers</th> <th>Department/Specialisation</th> </tr>";

        while($row = mysqli_fetch_row($std_result))
        {
            $html.="<tr>";
            for($x = 0;$x<10;$x++)
            { $html .= "<td>" . $row[$x] . "</td>"; }
            $html.="<td>".$stud_eligible."</td>";
        }

        $ugquery = "SELECT NO_OF_CERT_COURSES,STD_DEPARTMENT FROM UG_STUDENT WHERE STD_ROLLNO ='".$std_roll."';";
        $pgquery = "SELECT NO_OF_RESEARCH_PAPERS,Std_specialisation FROM PG_STUDENT WHERE STD_ROLLNO ='".$std_roll."';";

        $ugresult = mysqli_query($conn,$ugquery);
        $pgresult = mysqli_query($conn,$pgquery);

        $ugcount =  mysqli_num_rows($ugresult);
        $pgcount =  mysqli_num_rows($pgresult);

        if($ugcount >0)
        {
            $ugarray = mysqli_fetch_array($ugresult);
            $html.="<td>".$ugarray[0]."</td>";
            $html.="<td>".$ugarray[1]."</td>";
        }
        else if($pgcount >0)
        {
            $pgarray = mysqli_fetch_array($pgresult);
            $html.="<td>".$pgarray[0]."</td>";
            $html.="<td>".$pgarray[1]."</td>";
        }
        
        $html .= "</tr>";

        $html .= "</table>";

        echo $html;

    ?>
    </div>
</body>
</html>