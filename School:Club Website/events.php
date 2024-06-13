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


    
 <div class="logo"><a href="index.php"><img  src="Images/Logo.png" height="55"  alt="alien school logo"></a></div>
    
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="logout.php">LOG OUT</a></li>
            </div>
                
            <div class = "nav_links">
                <li><a href="member_details.php">Member Details</a></li>
                <li><a href="fees.php">Member Fees</a></li>
                <li><a class="active" href="events.php">Event Details</a></li>
                
            </div>
            </ul>
    </nav> 
    
    <h2>Event Records</h2>
    
     <div class="description"> <!--Site Description and Instructions for use-->
            <p>Use of Page:  Use the search bar to find a preferred member. Use the filter to filter results by a specific condition. To add a new event into the database use button to be redirected to form. For original table, use reset table button. To view total points of each member use to total points button. </p>
        </div>
    
     <div class="divider"></div> <!--Dividing line for styling and seperating sections-->
    
    
    <section>  
    
    <a href="form_events.php" class="btn">Add New Event Record</a>
     <a href="events_totalpoints.php" class="btn">Show Total Points</a>
    <a href="events.php" class="btn">Reset Table</a>
    
     
    <form enctype="multipart/form-data" action="events.php" method="post">
    <input type="text" class="search" name="value" placeholder="Search by Member Number, First Name or Last Name">    
    <button type = "submit" name="search" value="search">Search</button>
    </form>
    
    
    <form enctype="multipart/form-data" action="events.php" method="post">
                <label class="filter">Filter by Event Date: </label>
                <input type="date" id="date" name="date">
         <button type = "submit" name="filter" value="filter">Filter</button>
    </form>
    

   
                 
            
    
      
    <table id="detail_table">
        
       
        
        
        <tr>
            <th> Member No</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> Points</th>
            <th> Event Date</th>
          
        
        </tr>
        <?php
        
        include "connection.php";
        
        
        if(isset($_POST['search'])){
            $value = $_POST['value'];
            $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `Points`, Event_Date FROM Members LEFT OUTER JOIN Event_Records ON Members.Member_No = Event_Records.Member_ID WHERE CONCAT(FirstName, LastName , Member_No) LIKE '%$value%'";
            $result = mysqli_query($conn, $sql);
        ;
        }
        
        elseif(isset($_POST['filter'])){
            $date = $_POST['date'];
            echo($date);
            $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `Points`, `Event_Date` FROM Members LEFT OUTER JOIN Event_Records ON Members.Member_No = Event_Records.Member_ID WHERE Event_Date = '$date'";
             $result = mysqli_query($conn, $sql);
        }
        
        else{
             
        $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `Points`, `Event_Date` FROM Members LEFT OUTER JOIN Event_Records ON Members.Member_No = Event_Records.Member_ID";
        $result = mysqli_query($conn, $sql);
}
        
       
        while ($row = mysqli_fetch_array($result)){
    
            echo"<tr>";
            echo"<td>".$row['Member_No']."</td>";
             echo"<td>".$row['FirstName']."</td>";
             echo"<td>".$row['LastName']."</td>";
             echo"<td>".$row['Points']."</td>";
            echo"<td>".$row['Event_Date']."</td>";
            
            
            echo"</tr>";
                
        }
        
           
        
        ?>
        
    
    </table>
        
    </section>
    
<footer>
    <p>&copy; 2018 Alien School</p>
</footer>

