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
     
   <div class="logo"><a href="index.php"><img  src="Images/Logo.png" height="55"  alt="alien school logo"></a></div>
    <nav> 
            <ul>
            <div class="login_link">
            <li><a href="logout.php">LOG OUT</a></li>
            </div>
                
            <div class = "nav_links">
                <li><a  href="member_details.php">Member Details</a></li>
                <li><a class="active" href="fees.php">Member Fees</a></li>
                <li><a  href="events.php">Event Details</a></li>
                
            </div>
            </ul>
    </nav> 
</header>



   
    
    <h2>Member Fees</h2>
    
     <div class="description"> <!--Site Description and Instructions for use-->
            <p>Use of Page:  Use the search bar to find a preferred member. Use the filter to filter results by a specific condition. For original table, use reset table button. </p>
        </div>
    
     <div class="divider"></div> <!--Dividing line for styling and seperating sections-->
    
    <section>
    

    
    
    
    <a href="fees.php" class="btn">Reset Table</a>
    
    <form enctype="multipart/form-data" action="fees.php" method="post">
    <input type="text" class="search" name="value" placeholder="Search by Member Number, First Name or Last Name">    
    <button type = "submit" name="search" value="search">Search</button>
    </form>
    
      <form enctype="multipart/form-data" action="fees.php" method="post">
    
    <select class='filter' name="value">
        
        <option value=''disabled selected hidden >Filter by Payment Status </option>
        <option value="0">Has not paid</option>
        <option value="1">Has paid</option>
    
    </select>
    
       <button type = "submit" action="fees.php" name="payment_status" value="overdue">Filter</button>
    
     </form> 
    <table id="detail_table">
        
    <tr>
            <th> No</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> Parent or Guardian</th>
            <th> Annual Fee</th>
            <th> Amount Paid</th>
            <th> Amount Due</th>
            <th> Has paid</th>
            <th> Date Paid</th>
        </tr>
        
       

        <?php
        
        include "connection.php";
        
         if(isset($_POST['search'])){
            $value = $_POST['value'];
             $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `ParentGuardian`, `Annual_Fee`, `Amount_Paid`, `Has_Paid`, `Date_Paid`, (`Annual_Fee` - `Amount_Paid`) AS Amount_Due FROM Members WHERE CONCAT(FirstName, LastName , Member_No) LIKE '%$value%'"; 
             $result = mysqli_query($conn, $sql);
             
         }
        
        elseif(isset($_POST['payment_status'])){
              $value = $_POST['value'];
              $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `ParentGuardian`, `Annual_Fee`, `Amount_Paid`, `Has_Paid`, `Date_Paid`, (`Annual_Fee` - `Amount_Paid`) AS Amount_Due FROM Members WHERE Has_Paid = '$value' ";
              $result = mysqli_query($conn, $sql);

        }
        
        
        else{
              $sql = "SELECT `Member_No`, `FirstName`, `LastName`, `ParentGuardian`, `Annual_Fee`, `Amount_Paid`, `Has_Paid`, `Date_Paid`, (`Annual_Fee` - `Amount_Paid`) AS Amount_Due FROM Members ";
        $result = mysqli_query($conn, $sql);
            
        }
      
        while ($row = mysqli_fetch_array($result)){
            echo"<tbody id='detail_table'";
            echo"<tr>";
            echo"<td>".$row['Member_No']."</td>";
            echo"<td>".$row['FirstName']."</td>";
             echo"<td>".$row['LastName']."</td>";
             echo"<td>".$row['ParentGuardian']."</td>";
            echo"<td>".$row['Annual_Fee']."</td>";
             echo"<td>".$row['Amount_Paid']."</td>";
             echo"<td>".$row['Amount_Due']."</td>";
             if($row['Has_Paid'] === "1") {
                echo "<td> Yes </td>";
                
            }
                else
                {
                    echo"<td> No </td>";
                }
            
             echo"<td>".$row['Date_Paid']."</td>";
            echo"</tr>";
                
        }
        
           
        
        ?>
        
    
    </table>
        
    </section>
    
        
<footer >
    <p>&copy; 2019 Ormiston Athletic Club</p>
</footer>

    














