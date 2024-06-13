<?php

//secures page
session_start();
if(!(isset($_SESSION['logged_in']))){ //execute following code if session variable is not set
    $_SESSION['message'] = "Access Denied. Please Login."; //sets error message
    header("Location: session.php"); //redirects to session.php or login page
    
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

<body>

<header>
</header>


<section>
    
    <div class="logo"><img src="Images/Logo.png" height="55"  alt="alien school logo"></div>
    
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="student_detail.php">LOGIN</a></li>
            </div>
                
            <div class = "nav_links">
                <li><a href="member_details.php">Member Details</a></li>
                <li><a href="fees.php">Member Fees</a></li>
                <li><a class="active" href="events.php">Event Details</a></li>
                
            </div>
            </ul>
    </nav> 
    
    <h2>Event Records</h2>
    
     <a href="events_totalpoints.php" class="btn">Reset Table</a>
     <a href="events.php" class="btn">Go back to Events</a>
    
     
    <form enctype="multipart/form-data" action="events_totalpoints.php" method="post">
    <input type="text" class="search" name="value" placeholder="Search">    
    <button type = "submit" name="search" value="search">Search</button>
    </form>
    
    
   
            
    
      
    <table id="detail_table">
        
       
        
        
        <tr>
            <th> Member No</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> Total Points</th>

          
        
        </tr>
        <?php
        
        include "connection.php";
        
        
        if(isset($_POST['search'])){
            $value = $_POST['value'];
            $sql = "SELECT `Member_No`, `FirstName`, `LastName`, SUM(Points) AS Total FROM Members INNER JOIN Event_Records ON Members.Member_No = Event_Records.Member_ID WHERE CONCAT(FirstName, LastName) LIKE '%$value%' GROUP BY Member_No ORDER BY Total DESC ";
            $result = mysqli_query($conn, $sql);
        
        }
        
        elseif(isset($_POST['filter'])){
            $date = $_POST['date'];
            echo($date);
            $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `Points`, `Event_Date` FROM Members LEFT OUTER JOIN Event_Records ON Members.Member_No = Event_Records.Member_ID WHERE Event_Date = '$date'";
             $result = mysqli_query($conn, $sql);
        }
        
        else{
             
        $sql = "SELECT `Member_No`, `FirstName`, `LastName`, SUM(Points) AS Total FROM Members INNER JOIN Event_Records WHERE Members.Member_No = Event_Records.Member_ID GROUP BY Member_No ORDER BY Total DESC";
        $result = mysqli_query($conn, $sql);
}
        
       
        while ($row = mysqli_fetch_array($result)){
            echo"<tbody id='detail_table'";
            echo"<tr>";
            echo"<td>".$row['Member_No']."</td>";
             echo"<td>".$row['FirstName']."</td>";
             echo"<td>".$row['LastName']."</td>";
             echo"<td>".$row['Total']."</td>";
            
            
            echo"</tr>";
                
        }
        
           
        
        ?>
        
    
    </table>
    
<?php
    


?>
    