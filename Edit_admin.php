<?php
session_start();
include_once 'connect.php';

$admin_name = null;
$admin_phone_no = null;
$admin_id = null;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Personal Details</title>
    <link rel="stylesheet" href="Edit_student.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Admin.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">

        <div class="filter_search">
        <form action="" method="post">
        <label for="admin_idd" style="margin-left: 75px">Enter Your/Other Admin's ID:</label>
        <input type="text" id="admin_idd" name="filter_roll" tabindex="1" autofocus="autofocus">
        <input type="submit" name="filter_submit" value="Get Values" style="width: 40%;margin-left: 85px">
        </form>
        </div>
    
    <?php
    if(isset($_POST['filter_submit']))
    {
    $admin_id = $_POST['filter_roll'];

    $query = "select * from Administrator where admin_id = '".$admin_id."';";

    $fcl_result = mysqli_query($conn,$query);

    $row = mysqli_fetch_row($fcl_result);

    $admin_name = $row[1];
    $admin_phone_no = $row[3];
    }

    ?>

    <div>
      <h1 style="text-align: center">Admin Personal Details</h1> 
      <h4 style="text-align: center">Change the field you want to modify and click Update!!!</h4> 
    </div>
         <form method="post" action="">
        <div>
            <label for="username">
              <span class="required">Name: *</span> 
              <input type="text" id="username" name="user_name" value = "<?php echo $admin_name ?>" placeholder="Your Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="fcl_phone">
              <span class="required">Phone No: </span> 
              <input type="text" id="fcl_phone" name="fcl_phone_no" value="<?php echo $admin_phone_no ?>" placeholder="Your Phone No" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <input type="hidden" value="<?php echo $admin_id ?>" name="pass_admid">

        <div>              
            <button name="submitedit" type="submit" id="submit" >Update Table</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        $admin_id = $_POST['pass_admid'];
        $dbusername = $_POST['user_name'];
        $dbphone = $_POST['fcl_phone_no'];

        $update = "UPDATE ADMINISTRATOR SET ADMIN_NAME ='".$dbusername."',ADMIN_PHONE_NO ='".$dbphone."' WHERE ADMIN_ID = '".$admin_id."';";

        if (mysqli_query($conn,$update)) 
        {
          echo "<script>window.alert('Records Updates Successfully!!!'); window.location.href='Admin.php';</script>";
        }
         else 
        {
          echo "<script>window.alert('Records Update Failed'); window.location.href='Faculty.php';</script>";
        }
    }
    ?>

</body>
</html>