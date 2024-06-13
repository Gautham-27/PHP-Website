<?php
//initializing variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ormiston_Athletic";
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$parent_guardian = $_POST['parentguardian'];
$street_address = $_POST['streetaddress'];
$suburbs = $_POST['suburbs'];
$phone_no = $_POST['phoneno'];
$dateofbirth = $_POST['dob'];
$grade = $_POST['grade'];
$annual_fee = $_POST['annualfee'];
$amount_paid = $_POST['amountpaid'];
$has_paid = $_POST['haspaid'];
$date_paid = $_POST['datepaid'];
$h = $_POST['h'];

//connecting to database
$conn = mysqli_connect ($servername, $username, $password, $dbname);

//error if connection failed
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}

//sql to update values in database
if(isset($_POST['update'])) {
    
  
  $update_sql="UPDATE Members SET FirstName='$fname', LastName='$lname', ParentGuardian= '$parent_guardian', Street_Address='$street_address', SuburbID='$suburbs', Phone_No='$phone_no', Date_Of_Birth='$dateofbirth', GradeID='$grade', Annual_Fee='$annual_fee', Amount_Paid='$amount_paid', Has_Paid='$has_paid', Date_Paid='$date_paid' WHERE Member_No = '$h'";
   mysqli_query($conn, $update_sql);
    echo("Updated"); 
    echo"<meta http-equiv='refresh' content='1;member_details.php'>";
     //redirects to member details page after 1 second delay 
   
    
 
}