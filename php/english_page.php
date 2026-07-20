<?php
//getting the database connection
include "dbcon.php";
//runs if something was submitted
if(isset($_POST['submit'])){
    //takes the pieces of data entered by the user
    $rating=$_POST['rating'];
    $message=$_POST['message'];
    //preparing the insert using placeholders
    $stmt= $conn->prepare("INSERT INTO service_ratings(service_name, rating, message) VALUES (:service_name, :rating, :message)");
    //running statement and binding values to the placeholders 
    $stmt->execute([":service_name"=>"Coding",":rating"=>$rating,":message"=>$message]);
    //sending confirmation to user
    echo "<p>Feedback submitted.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="English Information">
    <meta name="keywords" content="english, tutoring, information">
    <meta name="author" content="Honeyeh Sayyadi">
    <title>english</title>
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="background-look">

    <!--navigation bar is fixed to be at the top of the page and used in multiple pages-->
    <div id="navbar">
        <a href="../html/index.html">Home</a>
        <a href="../html/about_us.html">About Us</a>
        <a href="../html/contact.html">Contact</a>
        <a href="../html/website_map.html">Map</a>
        <a href="../html/FAQ.html">FAQ</a>
        <!--drop down menu triggered when hovered on which lists all the services offered-->
        <div class="dropdown">
            <a href="#">Services ▼</a>
            <ul class="dropdown-content">
                <li><a href="../php/english_page.php">English</a></li>
                <li><a href="../php/french_page.php">French</a></li>
                <li><a href="../php/science_page.php">Biology/Chemistry/Physics</a></li>
                <li><a href="../php/reading_writing_page.php">Reading & Writing</a></li>
                <li><a href="../php/math_page.php">Math</a></li>
                <li><a href="../php/coding_page.php">Coding</a></li>
                <li><a href="../php/robotics_page.php">Robotics</a></li>
                <li><a href="../php/history_page.php">History</a></li>
                <li><a href="../php/geography_page.php">Geography</a></li>
                <li><a href="../php/exam_test_page.php">Exam Preparation & Test Preparation</a></li>
                <li><a href="../php/homework_page.php">Homework Help</a></li>
                <li><a href="../php/essay_page.php">Essay Writing</a></li>
                <li><a href="../php/summer_learning_page.php">Summer Learning Plan</a></li>
                <li><a href="../php/college_university_page.php">College & University Preparation</a></li>
                <li><a href="../php/learning_page.php">Learning and Studying Coaching</a></li>
                <li><a href="../php/STEM_page.php">STEM Program</a></li>
            </ul>
        </div>
        <!--php form pages and sign up/log in-->
        <a href="../php/job_page.php">Apply Now</a>
        <a href="../php/company_login.php">Company Account</a>
        <a href="../php/register.php">Sign Up/Log In</a>
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <!--company logo-->
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading-->
<h1 class="centre-txt-main">English Tutoring Service</h1>
<!--image-->
<div class="img-flex"><img src="../img/eng.jpg" id="main-img" alt="english tutoring"></div>
<!--description-->
<h2 class="centre-txt">Aimed towards students who need help with both reading and writing in English.</h2>
<!--feedback form with ratings 1 through 5 stars, only one can be selected at a time-->
<form method="post">

    <label>Rating:</label><br>

    <input type="radio" name="rating" value="1" required><div class="star"><img src="../img/star.png" alt="star"></div><br>
    <input type="radio" name="rating" value="2"><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><br>
    <input type="radio" name="rating" value="3"><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><br>
    <input type="radio" name="rating" value="4"><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><br>
    <input type="radio" name="rating" value="5"><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div><div class="star"><img src="../img/star.png" alt="star"></div>

    <br><br><br>
    <!--feedback box-->
    <textarea name="message" placeholder="Send feedback." rows="4" cols="30"></textarea>
    <br><br><br>
    <input class="my-button" type="submit" name="submit" value="Submit Rating">
</form>
    <!--JavaScript file that handles all JavaScript required portions for the pages-->
    <script src="../js/java_work.js"></script>
    <!--footer showed on all page-->
    <footer>
        <img src="../img/logo.svg" id="copyright" width="50" alt="Matrix Tutoring Logo">
        <p>© 2026 Matrix Tutoring.</p>
    </footer>

</body>
</html>