<?php
session_start();
//using the database connection
include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en-CA">
<!--job form page-->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site Job Form">
    <meta name="keywords" content="application, form, job">
    <meta name="author" content="Honeyeh Sayyadi">
    <title>application</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="background-look">
<!--audio for the sound that will play when the user pressed the button for submission-->
<audio id="submitSound" src="../aud/click_2.mp3" preload="auto"></audio>
   
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

    <div class="form-box" id="consult">
        <div class="tape"></div>
        <div class="form-rect">
            <div id="consult">
            <!--job application form that submits to process_job.php-->
            <form action="../php/process_job.php" method="post" enctype="multipart/form-data">
                <p class="form-title">APPLY FOR A JOB</p>
                <br>
                <label for="name" class="form-text">NAME</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="phone" class="form-text">PHONE NUMBER</label>
                <input type="text" id="phone" name="phone" required>
                <br>
                <label for="email" class="form-text">EMAIL</label>
                <input type="text" id="email" name="email" required>
                <br>
                <!--file input only accepts pdf/doc/docx files -->
                <label for="resume" class="form-text">RESUME</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                <br>
                <!--users can submit messages about what they can teach-->
                <label for="msg" class="form-text">MESSAGE</label>
                <textarea id="msg" name="msg" class="form-msg-box"
                    placeholder="Tell us what you are able to teach."></textarea>
                <br>
                <!--submit button plays a sound effect-->
                <button class="my-button , btn-link" type="submit" onclick="playSuccessSound()">Submit Request</button>
            </form>
            </div>
        </div>
    </div>
    <!--JavaScript file that handles all JavaScript required portions for the pages-->
    <script src="../js/java_work.js"></script>
    <!--footer showed on all page-->
    <footer>
        <img src="../img/logo.svg" id="copyright" width="50" alt="Matrix Tutoring Logo">
        <p>© 2026 Matrix Tutoring.</p>
    </footer>

</body>


</html>