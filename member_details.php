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



<header>
    <div class="logo"><a href="index.php"><img  src="Images/Logo.png" height="55"  alt="alien school logo"></a></div>
    
    <nav> 
            <ul>
            <div class="login_link"><!--logout link-->
            <li><a href="logout.php">LOG OUT</a></li>
            </div>
                
            <div class = "nav_links"><!--main nav links-->
                <li><a class="active" href="member_details.php">Member Details</a></li><!--Active nav link showing what page user is currently on-->
                  <li><a href="fees.php">Member Fees</a></li>
                <li><a href="events.php">Event Details</a></li>
                
            </div>
            </ul>
    </nav> 
</header>



    
    <h2>Member Details</h2>
    
      <div class="description"> <!--Site Description and Instructions for use-->
            <p>Use of Page:  Use the search bar to find a preferred member. Use the filter to filter results by a specific condition. To add a new member into the database use button to be redirected to form. For original table, use reset table button. Use the edit button to edit existing member's details. For additional information on members please click report to be directed to the member's report. </p>
        </div>
    
     <div class="divider"></div> <!--Dividing line for styling and seperating sections-->
    
    
    <section>  
    
    <a href="form.php" class="btn">Add New Member</a> <!--Button to Insert Form-->
    <a href="member_details.php" class="btn">Reset Table</a> <!--Button to Reset Table-->
  
    
    
    <form action="member_details.php" method="post"> <!--Search Form-->
    <input type="text" class="search" name="value" placeholder="Search by Member Number, First Name or Last Name">   <!--Search Input with placeholder instructions--> 
    <button type = "submit" name="search" value="search">Search</button> <!--Submits search value-->
    </form>
            

    <form action="member_details.php" method="post"> <!--Suburb Filter Form-->
    
    
                <select class="filter" name="suburb" > <!--Suburb dropdown for selection-->
                     <?php
                        echo"<option value=''disabled selected hidden >Filter by Suburb </option>"; //filter name and stops this option displaying when dropdown opened
                        include"connection.php";
                        $select="select * from Suburbs"; //selects value from suburbs table
                        $select_query= mysqli_query($conn,$select);
                        while ($select_array = $select_query->fetch_assoc()){
                        echo "<option
                    value=",$select_array['ID'],">",$select_array['Name'],"
                    </option>"; //displays each suburb option
                }
                ?>
                
                  
                </select>
     <button type = "submit" name="filter_suburb" value="filter_suburb">Filter</button> <!--submits suburb value-->
        
    </form>
    
    <form action="member_details.php" method="post"> <!--grade filter-->
        
    
                <select name="grade" class="filter" required>
                     <?php
                        echo"<option value='' disabled selected hidden>Filter by Grade </option>";
                        include"connection.php";
                        $select="select * from Grade";
                        $select_query= mysqli_query($conn,$select);
                        while ($select_array = $select_query->fetch_assoc()){
                        echo "<option
                    value=",$select_array['ID'],">",$select_array['Grade'],"
                    </option>";
                }
                ?>
                
                  
                </select>
        
         <button type = "submit" name="filter_grade" value="filter_grade">Filter</button>
    
    </form>


    
     
    <table id="detail_table"> <!--table for displaying members details-->
        
       
        
        
        <tr> <!--defines table row-->
            <th> No</th> <!--defines table header-->
            <th> First Name</th>
            <th> Last Name</th>
            <th> Parent or Guardian</th>
            <th> Street Address</th>
            <th> Suburb</th>
            <th> Phone Number</th>
            <th> Date of Birth</th>
            <th> Grade</th>
            <th> Annual Fee</th>
            <th> Amount Paid</th>
            <th> Has paid</th>
            <th> Date Paid</th>
            <th> Edit Details</th>
            <th> Profile</th>
        </tr>
        <?php
        if(isset($_POST['search'])){ //execute following code if search form is submitted
            

            include "connection.php";
            $value = $_POST['value']; //assign search value to search variable
            $sql = "SELECT * FROM Members WHERE CONCAT(Member_No, FirstName, LastName) LIKE '%$value%' "; //select from members table where columns Member_No, FirstName, LastName are like search value
            $result = mysqli_query($conn, $sql);
            
            
            
        }
        
        elseif(isset($_POST['filter_suburb'])){//execute following code if suburb form is submitted
            $suburb = $_POST['suburb']; //assign suburb value to suburb variable
            $suburb_sql = "SELECT * FROM Members WHERE SuburbID = '$suburb'"; //select row from members table where suburbid = suburb value
            $result = mysqli_query($conn, $suburb_sql);
}
        
        elseif(isset($_POST['filter_grade'])){//execute following code if grade form is submitted
            $grade = $_POST['grade']; //assign grade value to grade variable
            $grade_sql = "SELECT * FROM Members WHERE GradeID = '$grade' "; //select row from members table where gradeid = grade value
            $result = mysqli_query($conn, $grade_sql );
            
        }
        
        else{ //execute following code if no forms are submitted to display default table
             include "connection.php";
            $sql = "Select * from Members"; //select all values from members table
            $result = mysqli_query($conn, $sql);
            
        }
        
       
        while ($row = mysqli_fetch_array($result)){ //display table
            echo"<tbody id='detail_table'";
            echo"<tr>";
            echo"<td>".$row['Member_No']."</td>";
            echo"<td>".$row['FirstName']."</td>";
            echo"<td>".$row['LastName']."</td>";
            echo"<td>".$row['ParentGuardian']."</td>";
             echo"<td>".$row['Street_Address']."</td>";
            $id=$row['SuburbID'];
            $suburb_sql = "SELECT Name FROM Suburbs WHERE ID='$id'";
            $su = mysqli_query($conn, $suburb_sql);
            $suburb = mysqli_fetch_array($su);
            echo"<td>".$suburb['Name']."</td>";
            
            echo"<td>".$row['Phone_No']."</td>";
            echo"<td>".$row['Date_Of_Birth']."</td>";                        
            $id=$row['GradeID'];
            $grade_sql = "SELECT Grade FROM Grade WHERE ID='$id'";
            $gr = mysqli_query($conn, $grade_sql);
            $grade = mysqli_fetch_array($gr);
            echo"<td>".$grade['Grade']."</td>";
            echo"<td>".$row['Annual_Fee']."</td>";
            echo"<td>".$row['Amount_Paid']."</td>";
            if($row['Has_Paid'] === "1") {
                echo "<td> Yes </td>";
                
            }
                else
                {
                    echo"<td> No </td>";
                }
            
            echo"<td>".$row['Date_Paid']."</td>";
            
            echo"<form enctype='multipart/form-data' action='form_edit.php' method='post'>"; // edit form
            
            echo"<td style='display:none;'><input  type='hidden'  name='hidden' value=".$row['Member_No']."</td>"; //hidden input for submitting member_no of respective row
            
            echo"<td>"."<input  type='submit' name='edit' value='edit'/>"."</td>";//submit edit form to form_edit page
            
            echo"</form>";
            
            echo"<form enctype='multipart/form-data' action='report.php' method='post'>"; //report form
            
            echo"<td style='display:none;'><input  type='hidden'  name='hidden' value=".$row['Member_No']."</td>"; //hidden input for submitting member_no of respective row
        
            
            echo"<td>"."<input  type='submit' name='report'  value='report'>"."</td>"; //submit report form to report page
            
            
            echo"</form>";
        
            
            echo"</tr>";
                
        }
        
        
           
        
        ?>
        
    
    </table>
        
    </section>
    

    
   
     
    
    

    
<footer>
    <p>&copy; 2018 Alien School</p>
</footer>
    

