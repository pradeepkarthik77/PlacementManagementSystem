<?php 
session_start();
include_once 'connect.php';
$query = "SELECT * FROM placement p LEFT JOIN cmp_details c ON p.placed_cmp_id = c.cmp_id ORDER BY p.placed_cmp_id desc;";
$plm_result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Placement View</title>
<link rel="stylesheet" href="Placement_view.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="javascript:history.back();" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <?php
       $html = "<table class='htmltable'>";

       $html.="<tr> <th>Roll No</th> <th>Name</th> <th>Placed</th> <th>Placed Cmp Id</th> <th>Salary Package</th> <th>Job Description</th> <th>Benefits</th> <th>Cmp ID</th> <th>Cmp Name</th> <th>Cmp Branch</th> </tr>";

       while($row = mysqli_fetch_row($plm_result))
       {
           $html.="<tr>";
           for($x = 0;$x<10;$x++)
           { $html .= "<td>" . $row[$x] . "</td>"; }
           $html .= "</tr>";
       }
       $html .= "</table>";

       echo $html;
    ?>
</body>
</html>