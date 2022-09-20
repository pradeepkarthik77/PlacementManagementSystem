<?php
session_start();
$faculty_id = $_SESSION['staff_id'];

include_once 'connect.php';

$query = "select * from Faculty where faculty_id = '".$faculty_id."';";

$fcl_result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($fcl_result);

$fcl_name = $row[1];
$fcl_email = $row[2];
$fcl_phone_no = $row[3];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty Personal Details</title>
    <link rel="stylesheet" href="Faculty_personal_details.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Faculty.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">
    <div>
      <h1 style="text-align: center">Faculty Placement Details</h1> 
      <h4>Change the field you want to modify and click submit!!!</h4> 
    </div>
         <form method="post" action="">
        <div>
            <label for="username">
              <span class="required">Name: *</span> 
              <input type="text" id="username" name="user_name" value = "<?php echo $fcl_name ?>" placeholder="Your Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="fcl_phone">
              <span class="required">Phone No: </span> 
              <input type="text" id="fcl_phone" name="fcl_phone_no" value="<?php echo $fcl_phone_no ?>" placeholder="Your Phone No" tabindex="1" autofocus="autofocus" />
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
        $dbphone = $_POST['fcl_phone_no'];

        $update = "UPDATE FACULTY SET FACULTY_NAME ='".$dbusername."',FACULTY_PHONE_NO ='".$dbphone."' WHERE FACULTY_ID = '".$faculty_id."';";

        if (mysqli_query($conn,$update)) 
        {
          echo "<script>window.alert('Records Updates Successfully!!!'); window.location.href='Faculty.php';</script>";
        }
         else 
        {
          echo "<script>window.alert('Records Update Failed'); window.location.href='Faculty.php';</script>";
        }
    }
    ?>

</body>
</html>