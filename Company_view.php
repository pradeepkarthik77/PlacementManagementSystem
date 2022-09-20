<?php 
session_start();
include_once 'connect.php';
$query = "select * from cmp_details c1 NATURAL JOIN company c2 where c1.cmp_id=c2.cmp_id;";
$cmp_result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Company</title>
<link rel="stylesheet" href="Company_view.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="javascript:history.back()" style="color: white;" onclick="window.alert('You will be navigated to the Dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <?php
        $html = "<table class='htmltable'>";

        $html.="<tr> <th>Company ID</th> <th>Name</th> <th>Branch</th> <th>Phone no</th> <th>Email ID</th> <th>Eligibility Criteria</th> <th>Date of Visit</th> </tr>";

        while($row = mysqli_fetch_row($cmp_result))
        {
            $cmp_eligible="";
            $query1 = "SELECT ELIGIBILITY_CRITERIA FROM CMP_ELIGIBILITY_CRITERIA WHERE CMP_ID = '".$row[0]."';";
            $cmp_el = mysqli_query($conn,$query1);

            while($val = mysqli_fetch_row($cmp_el))
            {
                $cmp_eligible.=$val[0];
                $cmp_eligible.=",";
            }
            $cmp_eligible = substr($cmp_eligible, 0, -1);

            $cmp_date="";
            $query1 = "SELECT DATE_OF_VISIT FROM CMP_DATE_OF_VISIT WHERE CMP_ID = '".$row[0]."';";
            $cmp_dt = mysqli_query($conn,$query1);

            while($val = mysqli_fetch_row($cmp_dt))
            {
                $cmp_date.=$val[0];
                $cmp_date.=",";
            }
            $cmp_date = substr($cmp_date, 0, -1);

            $html.="<tr>";
            for($x = 0;$x<5;$x++)
            { $html .= "<td>" . $row[$x] . "</td>"; }
            $html.="<td>".$cmp_eligible."</td>";
            $html.="<td>".$cmp_date."</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";

        echo $html;

    ?>
</body>
</html>