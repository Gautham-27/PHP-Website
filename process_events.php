<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ormiston_Athletic";
$member_id = $_POST['member_id'];
$event_date = $_POST['event_date'];
$points = $_POST['points'];
   



$conn = mysqli_connect ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
}

echo "Connected successfully";
$sql="INSERT INTO Event_Records (Event_Date, Points, Member_ID) VALUES ('$event_date ', '$points', '$member_id') ";
if ($conn->query($sql) === TRUE) {
    echo "New record created sucessfully";
     echo"<meta http-equiv='refresh' content='1;events.php'>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


