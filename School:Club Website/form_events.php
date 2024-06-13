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


    
    <div class="logo"><img src="Images/Logo.png" height="55"  alt="alien school logo"></div>
    
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="events.php">GO BACK</a></li>
            </div>
    
            </ul>
    </nav> 
    
    <div class="form">
        <h3>Insert Events</h3>
        <form enctype="multipart/form-data" action="process_events.php" method="post" >
            <p>
                <label>Student ID</label>
                <input type="number"  name="member_id" required />
            </p>
             <p>
                <label>Event Date </label>
                <input type="date" name="event_date" required>
            </p>     
             <p>
                <label>Points</label>
                <input type="number" name="points" required/>
            </p>
            <p>
                <button type = "submit" name="add" value="add">Add Member</button>
            </p>
        </form>
    </div>
            
    
 <footer class="forms">
    <p>&copy; 2019 Ormiston Athletic Club</p>

</footer>