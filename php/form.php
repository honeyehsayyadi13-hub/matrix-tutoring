<?php
session_start();
//using the database connection
include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en-CA">
<!--form page-->
<head>
    <meta charset="UTF-8">
    <title>consultation</title>
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

    <div id="navbar">
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--consultation request form that submits to process.php-->
    <div class="form-box" id="consult">
        <div class="tape"></div>
        <div class="form-rect">
            <div id="consult">
            <form action="../php/process.php" method="post">
                <p class="form-title">REQUEST AN ASSESSMENT</p>
                <br>
                <label for="student" class="form-text">STUDENT'S NAME</label>
                <input type="text" id="student" name="student" required>
                <br>
                <label for="parent" class="form-text">PARENT'S NAME</label>
                <input type="text" id="parent" name="parent" required>
                <br>
                <!--dropdown of services offered for categorizing the request-->
                <label for="subject" class="form-text">SUBJECT</label>
                <select id="subject" name="subject" required>
                    <option value="">Select a service</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Physics">Physics</option>
                    <option value="Biology">Biology</option>
                    <option value="Math">Math</option>
                    <option value="Reading">Reading</option>
                    <option value="Writing">Writing</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Coding">Coding</option>
                    <option value="Robotics">Robotics</option>
                    <option value="Exam">Exam Preparation</option>
                    <option value="Test">Test Preparation</option>
                    <option value="Homework">Homework Help</option>
                    <option value="Essay">Essay Writing</option>
                    <option value="Summer">Summer Learning Plan</option>
                    <option value="College">College and University Preparation</option>
                    <option value="Learning">Learning and Studying Coaching</option>
                    <option value="STEM">STEM Program</option>
                </select>
                <br>
                <!--for choosing between the styles of service whether it is online or in person-->
                <label for="style" class="form-text">STYLE</label>
                <select id="style" name="style" required>
                    <option value="">Select a style</option>
                    <option>In-Person</option>
                    <option>Online</option>
                </select>
                <br>
                <label for="phone" class="form-text">PHONE NUMBER</label>
                <input type="text" id="phone" name="phone" required>
                <br>
                <label for="email" class="form-text">EMAIL</label>
                <input type="text" id="email" name="email" required>
                <br>
                <!--optional text field for parents to submit details-->
                <label for="msg" class="form-text">MESSAGE</label>
                <textarea id="msg" name="msg" class="form-msg-box"
                    placeholder="Tell us what she should know about your child."></textarea>
                <br>
                <!--submit button plays the sound effect-->
                <button class="my-button , btn-link" type="submit" onclick="playSuccessSound(event)">Submit Request</button>
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