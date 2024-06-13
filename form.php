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
            <li><a href="member_details.php">GO BACK</a></li><!--Link to take user back to members page-->
            </div>
    
            </ul>
    </nav> 
</header>


<body>
    


    
    
    <div class="form"> <!--insert form-->
        <h3> Insert New Member</h3>
        <form enctype="multipart/form-data" action="process.php" method="post" >
            <p>
                <label>First Name</label>
                <input pattern="[a-zA-Z]+" type="text"  name="firstname" placeholder="First Name" required/> <!--pattern for restricting input to only letters, required ensures form can not be submitted without the user entering a  value-->
            
            </p>
            <p>
                <label>Last Name</label>
                <input  pattern="[a-zA-Z]+" type="text" name="lastname" placeholder="Last Name" required/>
            </p>
            <p>
                <label>Parent or Guardian</label>
                <input pattern="[a-zA-Z]+*" type="text" name="parentguardian" required>
            </p>
            <p>
                <label>Street Address</label>
                <input type="text"  name="streetaddress" required>
            </p>
            <p>
                <label>Suburb:</label>
                <select name="suburbs" required>
                     <?php
                        echo"<option value=''disabled selected hidden >Choose a Suburb </option>"; //Instructions and stops this option displaying when dropdown opened
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
            </p>
            <p>
                <label>Phone Number</label>
                <input type="tel" id="phoneno" name="phoneno" required>
            </p>
            <p>
                <label>Date of Birth</label>
                <input type="date" id="dob" name="dob" required> <!--date input-->
            </p>
             <p>
                <label>Grade:</label>
                <select name="grade" required>
                     <?php
                        echo"<option value='' disabled selected hidden>Please choose </option>";
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
            </p>
            <p>
                <label>Annual Fee</label>
                <input type="number" id="annualfee" name="annualfee" required>
            </p>
            <p>
                <label>Amount Paid: </label>
                <input type="number" id="amountpaid" name="amountpaid">
            </p>  
            <p>
                <label>Has Paid?</label>
                <input type="checkbox" value="1" id="haspaid" name="haspaid"> <!--checkbox-->
            </p>   
            <p>
                <label>Date Paid: </label>
                <input type="date" id="datepaid" name="datepaid">
            </p>      
            <p>
                <button type = "submit" name="add" value="add">Add Member</button><!--submits form to process page-->
            
            </p>
            
            
            
            
            
            
            
            
        
        </form>
    
    </div>
    
 </body>
    
    
        
 <footer >
    <p>&copy; 2019 Ormiston Athletic Club</p>

</footer>
    

    
    