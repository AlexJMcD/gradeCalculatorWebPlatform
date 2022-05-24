<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name= "viewport" content = "width=device-width, initial-scale =1.0" >
        <meta name="keywords" content = "HTML5, CSS, JavaScript, Student, Assessment">
        <meta name="author" content = "Alexander McDonough, Student number: 19162522">
        <meta name="description" content = "My assessment page for TECH7004">
        <title>MSc computing science grade system</title>
        <link rel="icon" type="image/jpeg" href="images/OxfordBrookesUniversity-logo.jpg">
        <link rel="stylesheet" type="text/css" href="webpageExternalCSS.css">
    </head>
    <body>
        <nav class="main-nav">
            <a href="https://en.wikipedia.org/wiki/Oxford_Brookes_University" target="blank" class="nav-logo"><img src="images/brookes-logo-moodle-sm.png" alt="Logo"></a>
            <ul class="nav-list">
              <?php
                if(isset($_SESSION["studentid"])){
                  echo "<li><a class='nav-item' href='index.php'>Home</a></li>";
                  echo "<li><a class='nav-item' href='results.php'>Results</a></li>";
                  echo "<li><a class='nav-item' href='includes/logout.inc.php'>Log Out</a></li>";
                }
                else{
                  echo "<li><a class='nav-item' href='index.php'>Home</a></li>";
                  echo "<li><a class='nav-item' href='register.php'>Register</a></li>";
                  echo "<li><a class='nav-item' href='login.php'>Log In</a></li>";
                }
              ?>
            </ul>
          </nav>
        <div class="wrapper">