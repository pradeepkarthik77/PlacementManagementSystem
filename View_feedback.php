<?php 
session_start();
include_once 'connect.php';
$query = "select * from feedback;";
$feed_result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
<title>View Feedback</title>
<link rel="stylesheet" href="View_announcement.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="javascript:history.back()" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <?php
        $html = "<table class='htmltable'>";

        $html.="<tr> <th>Feedback ID</th> <th>Company ID</th> <th>Feedback Message</th> <th>Student Knowledge</th> <th>Student Behaviour</th> <th>Overall Rating</th> </tr>";

        while($row = mysqli_fetch_row($feed_result))
        {
            $html.="<tr>";
            for($x = 0;$x<6;$x++)
            { $html .= "<td>" . $row[$x] . "</td>"; }
            $html .= "</tr>";
        }
        $html .= "</table>";

        echo $html;

    ?>
</body>
</html>