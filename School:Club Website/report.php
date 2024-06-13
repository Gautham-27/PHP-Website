<?php

session_start();
if(!(isset($_SESSION['logged_in']))){
    $_SESSION['message'] = "Access Denied. Please Login.";
    header("Location: session.php");
    
}
?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ormiston Athletic Club">
    <meta name="keywords" content="Ormiston, Athletic, Club, admin">
    <meta name="author" content="Gautham Gunasheelan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300" rel="stylesheet">
   
   
   
    
    
    <title>Ormiston Athletic Club</title>
</head>



<header>
    <div class="logo"><img src="Images/Logo.png" height="55"  alt="alien school logo"></div>
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="member_details.php">GO BACK</a></li>
            </div>
    
            </ul>
    </nav> 
</header>

    
    <h2>Member Report</h2>
    
    
    <?php
    
    include "connection.php";
    $id = $_POST['hidden']; //assigns member number to id variable
    $sql = "SELECT * FROM Members WHERE Member_No = '$id'"; 
    $result = mysqli_query($conn, $sql); //selects row from members table where member number = id
    while ($row = mysqli_fetch_array($result)){
        echo"<div id='report'>"; //div for styling report
        echo"<h1>".$row['FirstName']." ".$row['LastName']."</h1>";
        echo"<div class='left'>";
        echo"<h2 class='category'>Parent/Guardian:</h2><h2>  ".$row['ParentGuardian']."</h2>";
        echo"<h2 class='category'>Street Address:</h2><h2> ".$row['Street_Address']."</h2>";
        $id = $row['SuburbID'];
        $suburb_sql = "SELECT Name FROM Suburbs WHERE ID='$id'";
        $su = mysqli_query($conn, $suburb_sql);
        $suburb = mysqli_fetch_array($su);
        echo"<h2 class='category'>Suburb:</h2><h2>".$suburb['Name']."</h2>";
        echo"</div>";
         echo"<div class='left'>";
        echo"<h2 class='category'>Phone Number:</h2><h2> ".$row['Phone_No']."</h2>";
        echo"<h2 class='category'>Date of Birth:</h2><h2>".$row['Date_Of_Birth']."</h2>";
        $id = $row['GradeID'];
        $grade_sql = "SELECT Grade FROM Grade WHERE ID='$id'";
            $gr = mysqli_query($conn, $grade_sql);
            $grade = mysqli_fetch_array($gr);
        echo"<h2 class='category'>Grade:</h2><h2>".$grade['Grade']."</h2>";
        echo"</div>";
         echo"<h1 class='sub'>Member Fees</h1>";
        echo"<div id='fees'>";
        echo"<h2 class='category'>Annual Fee:</h2><h2>  $".$row['Annual_Fee']."</h2>";
        echo"<h2 class='category'>Amount Paid:</h2><h2>  $".$row['Amount_Paid']."</h2>";
        if($row['Has_Paid'] === "1") {
                echo "<h2 class='category'>Has Paid:</h2><h2> Yes </h2>";
                
            }
                else
                {
                    echo"<h2 class='category'>Has Paid:</h2><h2> No </h2>";
                }
         echo"<h2 class='category'>Date Paid: </h2><h2>  ".$row['Date_Paid']."</h2>";
        
        
        echo"</div>";
        echo"<h1 class='sub'>Events</h1>";
        
    }
    
    ?>
    
    <table class='report_events'>
     <tr>
         <th> Event Date</th>  
         <th> Points</th>
     </tr> 
     
    
    
    
 
    
    <?
    

    
    $sql_events = "SELECT * FROM Event_Records WHERE Member_ID = '$id'"; //selects from event records where row = id
    $result_events = mysqli_query($conn, $sql_events);
    while ($row = mysqli_fetch_array($result_events)){
        echo"<tr>";
        echo"<td>".$row['Event_Date']."</td>";
        echo"<td>".$row['Points']."</td>";
        echo"</tr>";
        
        
        
        
    }
        
    
    echo"</table>";
    echo"</div>";
        
    ?>
        



    
        

        
      
 <footer >
    <p>&copy; 2019 Ormiston Athletic Club</p>

</footer>