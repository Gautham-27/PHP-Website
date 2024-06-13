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

//connecting to database
$conn = mysqli_connect ($servername, $username, $password, $dbname);

//error if connection failed
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}

//message for successful connection
echo "Connected successfully.  ";

//sql to insert values into database
$sql="INSERT INTO Members (FirstName, LastName, ParentGuardian, Street_Address, SuburbID, Phone_No, Date_Of_Birth, GradeID, Annual_Fee, Amount_Paid, Has_Paid, Date_Paid) VALUES ('$fname', '$lname', '$parent_guardian', '$street_address', '$suburbs', '$phone_no', '$dateofbirth', '$grade', '$annual_fee', '$amount_paid', '$has_paid', '$date_paid') ";

//message if insert successful
if ($conn->query($sql) === TRUE) {
    echo "New record created sucessfully";
    echo"<meta http-equiv='refresh' content='1;member_details.php'>";//redirects to member details page after 1 second delay 
    
} 
    //error message
    else {
    echo("Error Description: ". mysqli_error($conn));
}