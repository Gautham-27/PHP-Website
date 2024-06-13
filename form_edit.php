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
    <div class="logo">
        <img href="index.php" src="Images/Logo.png" height="55"  alt="alien school logo">
    </div>
     <nav> 
            <ul>
            <div class="login_link">
            <li><a href="member_details.php">GO BACK</a></li>
            </div>
    
            </ul>
    </nav> 
   
</header>
    
<body> 
    <?php
        include "connection.php";
        $id = $_POST['hidden']; //assigns member number to id variable
        $sql = "SELECT * FROM Members WHERE Member_No='$id'";//selects row from members table where member number = id
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
    ?>
    
    <div class="form">
    <h3>Update Member Details</h3>
    <form enctype="multipart/form-data" action="edit.php" method="post" >
    
    <?php
        echo"<input type='hidden' id='h' name='h' value=".$_POST['hidden'].">"; //submits hidden variable to edit process so sql can update to correct row
        
        echo "<p><label>First Name</label><input type='text' pattern='[a-zA-Z]+'  id='firstname' name='firstname' value='".$row['FirstName']."'></p>"; //value autofills with value from selected row
            
        echo "<p><label>Last Name</label><input type='text'  pattern='[a-zA-Z]+' id='lastname' name='lastname'   value='".$row['LastName']."'></p>";
        
        echo "<p><label>Parent or Guardian</label><input type='text' pattern='[a-zA-Z]+*' id='parentguardian' name='parentguardian' value='".$row['ParentGuardian']."'  name='parentguardian' ></p>";
           
        echo "<p><label>Street Address</label><input type='text' id='streetaddress' name='streetaddress' value='".$row['Street_Address']."'></p>";
    
        echo"<p><label>Suburb: </label><select name ='suburbs'>";
             $suburb_id = $row['SuburbID'];
             $suburb_sql = "SELECT Name FROM Suburbs WHERE ID='$id'";
             $su = mysqli_query($conn, $suburb_sql);
             $suburb = mysqli_fetch_array($su);
             echo"<option value=".$row['SuburbID'].">".$suburb['Name']."</option>";
             echo"<option value=''> Choose New Suburb</option>";
             $select="select * from Suburbs";
             $select_query= mysqli_query($conn,$select);
             while ($select_array = $select_query->fetch_assoc()){
             echo "<option value=",$select_array['ID'],">",$select_array['Name'],"</option>";} 
               
       echo"</select></p>";
    
       echo"<p><label>Phone Number</label><input type='tel' id='phoneno' name='phoneno' value='".$row['Phone_No']."'></p>";
           
       echo" <p><label>Date of Birth</label> <input type='date' id='dob' name='dob' value='".$row['Date_Of_Birth']."'><p>";
     
       echo"<p><label>Grade:</label><select name='grade'>";
            $grade_id=$row['GradeID'];
            $grade_sql = "SELECT Grade FROM Grade WHERE ID='$grade_id'";
            $gr = mysqli_query($conn, $grade_sql);
            $grade = mysqli_fetch_array($gr);
            echo"<option value=".$row['GradeID'].">".$grade['Grade']."</option>";
            echo"<option value=''> Choose New Grade</option>";
            $select="select * from Grade";
            $select_query= mysqli_query($conn,$select);
            while ($select_array = $select_query->fetch_assoc()){
            echo "<option
                    value=",$select_array['ID'],">",$select_array['Grade'],"</option>";
                }
        
            echo"</select></p>";
    
            echo" <p><label>Annual Fee</label><input type='number' id='annualfee' name='annualfee' value='".$row['Annual_Fee']."'></p>";
    
            echo" <p><label>Amount Paid: </label><input type='number' id='amountpaid' name='amountpaid' value='".$row['Amount_Paid']."'></p> ";
        
            if($row['Has_Paid'] === "1") {
                echo" <p><label>Has Paid</label>
                <input type='checkbox' value='1' id='haspaid' name='haspaid' checked></p> " ;
            
         }
            else
               {
                   
                echo" <p><label>Has Paid</label><input type='checkbox' value='1' id='haspaid' name='haspaid' ></p> ";
                   
               }
    
            echo" <p><label>Date Paid: </label><input type='date' id='datepaid' name='datepaid' value='".$row['Date_Paid']."'></p> ";
                
            echo"<p><button type = 'submit' name='update' value='update' id='update'>Update</button></p>"; //submits form to update process
        
        }
    
?>
    
    </form>       
    
    </div>
          
</body>
    
    
 <footer >
    <p>&copy; 2019 Ormiston Athletic Club</p>

</footer>
            
            
            
            
            
            
        

    

    

    
    