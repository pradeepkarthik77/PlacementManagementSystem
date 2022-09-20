<?php
session_start();
$useremail = $_SESSION['login_user_email'];
$_SESSION['user_email'] = $useremail;
include_once 'connect.php';
$query = "select std_rollno from student where std_email_id = '".$useremail."';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$std_roll_no = $row[0];
$_SESSION['user_rollno'] = $std_roll_no;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student</title>

    <link rel="stylesheet" href="Student.css" />
  </head>

  <body>
    <h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -70px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <div class="grid" style="margin-top: 70px;">
      <div class="grid-item" style="margin-top: 50%;">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">Edit Your Personal Details</h1>
            <p class="card-text">
              Edit details of your entries in the Student Table.
            </p>
            <a href="student_personal_details.php"> <button class="card-btn">Edit Details<span>&rarr;</span></button></a>
          </div>
        </div>
      </div>
      <div class="grid-item" style="margin-top: 50%;">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">Edit Your Placement Details</h1>
            <p class="card-text">
              Edit details of your entries in the Placement Table.
            </p>
            <a href="Student_placement_details.php"> <button class="card-btn">Edit Details<span>&rarr;</span></button></a>
          </div>
        </div>
      </div>
      <div class="grid-item">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">View Tables</h1>
            <p class="card-text">
              View details of the student/company/placement/<br>faculty/Admin/report/<br>Announcement/Feedback tables.
            </p>
            <a href="Student_personal_view.php"> <button class="card-btn">View Student<span>&rarr;</span></button></a><br>
            <a href="Company_view.php"> <button class="card-btn">View Company<span>&rarr;</span></button></a><br>
            <a href="View_student_placement.php"> <button class="card-btn">View Placement<span>&rarr;</span></button></a><br>
            <a href="View_faculty.php"> <button class="card-btn">View Faculty<span>&rarr;</span></button></a><br>
            <a href="View_admin.php"> <button class="card-btn">View Admin<span>&rarr;</span></button></a><br>
            <a href="View_announcement.php"> <button class="card-btn">View Announcement<span>&rarr;</span></button></a><br>
          </div>
        </div>
      </div>
      </div>
      <br><br><br><br>
  </body>
</html>
