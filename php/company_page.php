<?php
//resumes session to check if the user is logged in
session_start();
//user is sent out if they are not logged in
if (!isset($_SESSION["logged_in_user"])){
    header("Location: company_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en-CA">
<head>
    <title>home</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--style sheet geared towards the company pages-->
    <link rel="stylesheet" href="../css/company.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="background-look">
<!--navigation bar is fixed to be at the top of the page and used in multiple pages, this is customized to the company-->
 <div id="navbar">
        <a href="../php/company_page.php">Home</a>
        <a href="../php/admin_job_page.php">Job Applications</a>
        <a href="../php/admin_requests.php">Consultation Requests</a>
        <a href="../php/admin_monitor.php">Monitoring</a>
        <a href="../php/admin_ratings.php">Ratings</a>
        <a href="../php/student_progress.php">Student Progress</a>
        <a href="../php/admin_users.php">Manage Users</a>
        <a href="../php/admin_services.php">Manage Services</a>
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading-->
<h1 class="centre-txt-main">Welcome to the Company Page</h1>

<!--sub heading-->
<h2 class="centre-txt">Add Student Progress</h2>
<!--form to log a student's progress and goes to the save_progress.php file through POST-->
<form action="../php/save_progress.php" method="post">
    <label>Student Name</label><br>
    <input type="text" name="student_name" required><br><br>
<label for="subject">Subject</label><br>
<input type="text" id="subject" name="subject" placeholder="Enter the subject covered" required><br><br>
    <label>Session Notes</label><br>
    <textarea name="progress_notes" rows="10" cols="60" placeholder="Discuss what was done today." required></textarea>
    <br><br>
    <button type="submit" class="my-button">Save Progress</button>
</form>
<br><br><br>
<button type="submit" name="logout" class="my-button"><a href="../php/logout.php"><p class="small-text">Log Out</p></a></button>

<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>

</body>
</html>