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
    
<div class="wrapper">

<body>
    


<header>
</header>
    




    
    <div class="logo"><img src="Images/Logo.png" height="55"  alt="alien school logo"></div>
    
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="index.php">GO BACK</a></li>
            </div>
            </ul>
    </nav> 
    
    
<form class="login_form" action="session.php" method="post"><!--login form-->
    <h3> Admin Login</h3>       
    <input class="login" type="text" name="username" placeholder="Enter Username" required><!--username input-->
    <input class="login" type="text" name="password" placeholder="Enter Password" required><!--password input-->
    <input class="login" type="submit" value="login" name="login"><!-- submits username and password -->
      
</form>



    
<?php

include "connection.php";
session_start(); 
if(isset($_SESSION['message'])){ //if message variable is set run following code
    echo "<div id='error'>".$_SESSION['message']."</div>"; //displays error message if username/password incorrect or access was denied to  a secure page
    unset($_SESSION['message']); //unsets message variable
    
}
    
if(isset($_POST['login'])){ //if login form submitted run following code
    $username = $_POST['username']; //Assigns value of inputed username to variable
    $password = $_POST['password']; //Assigns value of inputed password to variable
    
    
    $sql = "SELECT * from Admin WHERE username='$username' and password='$password'"; //select value from admin table where both username and password match given input
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result); //count how many rows combination of username and password are present
    
    if($count == 1){ //execute following code if username and password combination exists in 1 row
        $_SESSION['user'] = $username; //set session user to username
        $_SESSION['logged_in'] = true; //sets session variable to logged in and user is now logged in
        header("Location: member_details.php"); //redirects to member details page
    }
    
    
    else{ //execute following code if username and password combination was not found in any rows
         $_SESSION['message'] = "Sorry your username or password was incorrect. Please try again."; //sets error message to be displayed after page is reloaded
         header("Location: session.php"); //reloads page
        
       
    }
    exit();
}

?>
    

    
    </body>
    

    
    
    
    
<footer class="forms">
    <p>&copy; 2019 Ormiston Athletic Club</p>
</footer>

    </div>
