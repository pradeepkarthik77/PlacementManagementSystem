<?php
session_start();
$useremail = $_SESSION['login_user_email'];
include_once 'connect.php';
$query = "select admin_id from administrator where admin_email_id = '".$useremail."';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$admin_id = $row[0];
$_SESSION['user_id'] = $admin_id;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <link rel="stylesheet" href="Admin.css" />
  </head>

  <body>
    <h1 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -70px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
    <div class="grid" style="margin-top: 70px;">
      <div class="grid-item">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">Edit Tables</h1>
            <p class="card-text">
              Edit details of the student/company/placement/<br>faculty/Admin/Report table.
            </p>
            <a href="Edit_student.php"> <button class="card-btn">Edit Student<span>&rarr;</span></button></a><br>
            <a href="Edit_company.php"> <button class="card-btn">Edit Company<span>&rarr;</span></button></a><br>
            <a href="Edit_placement.php"> <button class="card-btn">Edit Placement<span>&rarr;</span></button></a><br>
            <a href="Edit_faculty.php"> <button class="card-btn">Edit Faculty<span>&rarr;</span></button></a><br>
            <a href="Edit_admin.php"> <button class="card-btn">Edit Admin<span>&rarr;</span></button></a><br>
          </div>
        </div>
      </div>
      <div class="grid-item">
        <div class="card">
          <div class="card-content">
            <h1 class="card-header" style="color: white;">Make an Announcement</h1>
            <p class="card-text">
            Click the below button to make an Announcement
            </p>
            <a href="Edit_announcement.php"> <button class="card-btn">Announcement<span>&rarr;</span></button></a>
          </div>
        </div>
        <div class="grid-item" style="margin-top: 20px;">
          <div class="card">
            <div class="card-content">
              <h1 class="card-header" style="color: white;">Enter Feedback</h1>
              <p class="card-text">
              Click the below button to enter the Feedback provided by companies
              </p>
              <a href="Edit_feedback.php"> <button class="card-btn">Feedback<span>&rarr;</span></button></a>
            </div>
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
