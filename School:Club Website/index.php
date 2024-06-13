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
         <div class="logo"><img src="Images/Logo.png" height="55"  alt="alien school logo"></div><!--Site logo image-->
        <nav> <!--navigation link to login file-->
            <ul>
            <div class="login_link">
            <li><a href="session.php">LOGIN</a></li>
            </div>
            </ul>
        </nav> 
    </header>

    
    <div id="banner"><!--Banner Image-->
        <div id="slogan">
            <h1> OAC</h1><!--Banner Text -->
        </div>
        <div id="subtitle"><!--Subtitle Text-->
            <h2>Striving for Success</h2>
        </div>
    
    </div>
    
    <section>
        <div class="description"> <!--Site Description and Instructions for use-->
            <h3>Welcome to the Admin Site</h3>
            <p>Authorised admins will need to login to access remaining pages. Admins will be able to view details of all Athletics Club members including details on fees, points and participated events. Admins can insert new members and edit the details of existing members </p>
        </div>
    
        <div class="divider"></div> <!--Dividing line for styling and seperating sections-->
    
    
    
        <slideshow><!--container for slideshow-->
            <img id='slide' width="1100" height="700"> <!--Slideshow Images/Slides-->
        
            <div class="dotContainer"><!--Indicator dot container-->
                <span class="dot"></span> <!--Individual dots-->
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot active"></span> <!--Active dot for seperate styling to indicate active slide-->
            </div>
        
        
    

    
        <script>
            var i = 0;
            var slideIndex = 0;
            var dotIndex = 0
            var slides = [];
            var time = 2000; //Time between each slide
        
            slides[0] = 'Images/image1.jpg'; //Source for each slide
            slides[1] = 'Images/image2.jpg';
            slides[2] = 'Images/image3.jpg';
            slides[3] = 'Images/image4.jpg';
        
            function changeSlides(){ //function to change slides and indicator dots

                document.getElementById('slide').src = slides[i]; //Gets image by id and changes source based on var i
                var dots = document.getElementsByClassName("dot"); //Gets dots 
            
            
                if(i < slides.length - 1){ 
                i++; //increments var i by 1
                }   else{
                        i = 0; //resets var i to 0 if i becomes greater than slides length
                }
                        
                       
                slideIndex++;//increments slide index
                if (slideIndex > slides.length) {slideIndex = 1} //resets slideIndex to 1 if it is greater than slides.length
                for (dotIndex = 0; dotIndex < dots.length; dotIndex++) {
                    dots[dotIndex].className = dots[dotIndex].className.replace(" active", ""); //removes active class from dot when dot's corresponding slide is no longer displayed
                }
            
                dots[slideIndex-1].className += " active"; //changes dot class to active when corresponding slide is displayed
                setTimeout("changeSlides()", time); //sets time between each slide
                    
                       
                }
            
                window.onload = changeSlides; //executes changeSlides once page has loaded
        
      </script>
            
      </slideshow>
    
      <div class="divider"></div><!--Dividing line for styling and seperating sections-->
      

    
<footer>
    <p>&copy; 2019 Ormiston Athletic Club</p>
</footer>
    


    
    
  
