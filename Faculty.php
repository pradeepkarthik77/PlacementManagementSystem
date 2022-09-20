<?php
session_start();
$useremail = $_SESSION['login_user_email'];
$_SESSION['user_email'] = $useremail;
include_once 'connect.php';
$query = "select faculty_id from faculty where faculty_email_id = '".$useremail."';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$faculty_id = $row[0];
$_SESSION['staff_id'] = $faculty_id;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faculty</title>

    <link rel="stylesheet" href="Faculty.css" />
  </head>

  <body>
    <h1 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -70px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <div class="grid" style="margin-top: 70px;">
      <div class="grid-item" style="margin-top: 50%;">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">Edit Your Details</h1>
            <p class="card-text">
              Edit details of your entries in the Faculty Table.
            </p>
            <a href="Faculty_personal_details.php"> <button class="card-btn">Edit Details<span>&rarr;</span></button></a>
          </div>
        </div>
      </div>
      
      <div class="grid-item">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">View Tables</h1>
            <p class="card-text">
              View details of the student/company/placement/<br>faculty/Admin/report/Announcement/<br>Feedback tables.
            </p>
            <a href="Student_view.php"> <button class="card-btn">View Student<span>&rarr;</span></button></a><br>
            <a href="Company_view.php"> <button class="card-btn">View Company<span>&rarr;</span></button></a><br>
            <a href="Placement_view.php"> <button class="card-btn">View Placement<span>&rarr;</span></button></a><br>
            <a href="View_faculty.php"> <button class="card-btn">View Faculty<span>&rarr;</span></button></a><br>
            <a href="View_admin.php"> <button class="card-btn">View Admin<span>&rarr;</span></button></a><br>
            <a href="View_report.php"> <button class="card-btn">View Report<span>&rarr;</span></button></a><br>
            <a href="View_announcement.php"> <button class="card-btn">View Announcement<span>&rarr;</span></button></a><br>
            <a href="View_feedback.php"> <button class="card-btn">View Feedback<span>&rarr;</span></button></a><br>
          </div>
        </div>
      </div>
      </div>
    
    
  </body>
</html>
