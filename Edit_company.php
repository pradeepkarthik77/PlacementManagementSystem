<?php
session_start();

include_once 'connect.php';


$cmp_eligible = "";
$cmp_id = "";
$cmp_name ="";
$cmp_phoneno = "";
$cmp_branch = "";
$cmp_date_of_visit = "";
$cmp_emailid = "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Company</title>
    <link rel="stylesheet" href="Edit_company.css">
</head>
<body>
<h2 style="text-align: center;font-family: cursive;font-size: 40px;color: rgb(241, 206, 7);background-color: rgb(146, 21, 17);margin-top: -5px">Placement Management System</h1><br><br>
    <div style="text-align: right;margin-top: -110px;margin-right: 140px;font-size: 22px;font-weight: bold;color: white;"><a href="Admin.php" style="color: white;" onclick="window.alert('You will be navigated to dashboard')">Dashboard</a></div>
    <div style="text-align: right;margin-top: -26px;margin-right: 40px;font-size: 22px;font-weight: bold;color: white;"><a href="login.html" style="color: white;" onclick="window.alert('You will be logged out of the system')">Logout</a></div>
<div id="contact-form">
    <div>
      <h1 style="text-align: center">Company Details</h1> 
      <h4>Change the field you want to modify and click submit!!!</h4> 
    </div>

        <div class="filter_search">
        <form action="" method="post">
        <label for="cmpny_id">Enter the Comapany ID:</label>
        <input type="text" id="cmpny_id" name="filter_roll" tabindex="1" autofocus="autofocus">
        <input type="submit" name="filter_submit" value="Get Values" style="width: 40%;margin-left: 85px">
        </form>
        </div>
  
        <?php 

        if(isset($_POST['filter_submit']))
        {
            $cmp_id = $_POST['filter_roll'];

            $query = "select * from company where cmp_id= '".$cmp_id."';";

            $cmp_result = mysqli_query($conn,$query);

            $row = mysqli_fetch_row($cmp_result);

            $cmp_phoneno = $row[1];
            $cmp_emailid = $row[2];

            $query0 = "select * from cmp_details where cmp_id= '".$cmp_id."';";

            $cmp_result1 = mysqli_query($conn,$query0);

            $row1 = mysqli_fetch_row($cmp_result1);

            $cmp_name = $row1[1];
            $cmp_branch = $row1[2];


            $query1 = "select eligibility_criteria from cmp_eligibility_criteria where cmp_id='".$cmp_id."';";
            $eligibility = mysqli_query($conn,$query1);

            $cmp_eligible = "";

            while($eligi = mysqli_fetch_row($eligibility))
            {
                $cmp_eligible.=$eligi[0];
                $cmp_eligible.=";";
            }

            $cmp_eligible = substr($cmp_eligible, 0, -1);
            
            $query2 = "select date_of_visit from cmp_date_of_visit where cmp_id='".$cmp_id."';";
            $date_of = mysqli_query($conn,$query2);

            while($daterow = mysqli_fetch_row($date_of))
            {
                $cmp_date_of_visit.=$daterow[0];
                $cmp_date_of_visit.=";";
            }

            $cmp_date_of_visit = substr($cmp_date_of_visit, 0, -1);
        }
        ?>

         <form method="post" action="">
        <div>
            <label for="cmpname">
              <span class="required">Company Name: *</span> 
              <input type="text" id="cmpname" name="cmp_name" value = "<?php echo $cmp_name ?>" placeholder="Company's Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="comp_branch">
              <span class="required">Company's Branch: *</span> 
              <input type="text" id="comp_branch" name="cmp_branch" value="<?php echo $cmp_branch ?>" placeholder="Company's Branch Name" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="phno">
              <span class="required">Company's Phone No: *</span> 
              <input type="text" id="phno" name="cmp_phno" value="<?php echo $cmp_phoneno ?>" placeholder="Company's Phone No" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="email_cmp">
              <span class="required">Company's Email ID: *</span> 
              <input type="text" id="email_cmp" name="cmp_emailid" value="<?php echo $cmp_emailid ?>" placeholder="Company's Email id" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>

        <div>
            <label for="cm_eligible">
              <span class="required">Company's eligiblity Criteria (place a ; between Company's eligiblity Criteria): *</span> 
              <input type="text" id="cm_eligible" name="cmp_eligibility_" value="<?php echo $cmp_eligible ?>" placeholder="Company's Eligibility Criteria" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <div>
            <label for="cm_date">
              <span class="required">Company's Date Of Visit: Format(yyyy-mm-dd) (place a ; between Company's date of visit): *</span> 
              <input type="text" id="cm_date" name="cmp_date_" value="<?php echo $cmp_date_of_visit ?>" placeholder="Company's Date of Visit" required="required" tabindex="1" autofocus="autofocus" />
            </label> 
        </div>  

        <input type="hidden" value="<?php echo $cmp_id ?>" name="pass_rollno">
        <div>              
            <button name="submitedit" type="submit" id="submit" >Update Table</button> 
        </div>
         </form>
    </div>

    <?php
    if(isset($_POST['submitedit']))
    {
        
        $dbcmp_eligible = $_POST['cmp_eligibility_'];
        $dbcmp_id = $_POST['pass_rollno'];
        $dbcmp_name = $_POST['cmp_name'];
        $dbcmp_phoneno = $_POST['cmp_phno'];
        $dbcmp_branch = $_POST['cmp_branch'];
        $dbcmp_date_of_visit = $_POST['cmp_date_'];
        $dbcmp_emailid = $_POST['cmp_emailid'];

        $update = "UPDATE COMPANY SET CMP_PHONENO = '$dbcmp_phoneno',CMP_EMAIL_ID='$dbcmp_emailid' WHERE CMP_ID='$dbcmp_id';";

        $queryup = "UPDATE CMP_DETAILS SET CMP_NAME = '$dbcmp_name',CMP_BRANCH = '$dbcmp_branch' WHERE CMP_ID = '$dbcmp_id'";

        $pieces = explode(";",$dbcmp_eligible);

        $deleteq = "DELETE  FROM CMP_ELIGIBILITY_CRITERIA WHERE CMP_ID = '".$dbcmp_id."';";

        $temp = mysqli_query($conn,$deleteq);

        for($i=0;$i<count($pieces);$i++)
        {
            $update1 = "INSERT INTO CMP_ELIGIBILITY_CRITERIA VALUES('".$dbcmp_id."','".$pieces[$i]."');";
            $temp1 = mysqli_query($conn,$update1);
        }

        $pieces = explode(";",$dbcmp_date_of_visit);

        $deleteq = "DELETE  FROM CMP_DATE_OF_VISIT WHERE CMP_ID = '".$dbcmp_id."';";

        $temp = mysqli_query($conn,$deleteq);
        

        for($i=0;$i<count($pieces);$i++)
        {
            $update1 = "INSERT INTO CMP_DATE_OF_VISIT VALUES('".$dbcmp_id."','".$pieces[$i]."');";
            $temp1 = mysqli_query($conn,$update1);
        }

        $temp = mysqli_query($conn,$queryup);


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