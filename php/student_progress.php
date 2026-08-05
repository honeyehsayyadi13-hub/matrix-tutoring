<?php
include("dbcon.php");
//querying all the progress entires by most recent session first
$stmt= $conn->query("SELECT * FROM student_progress ORDER BY session_date DESC");
?>

<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title>website monitoring</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--style sheet geared towards the company pages-->
    <link rel="stylesheet" href="../css/company.css">
    <!--stylesheet for the contact page but also used in the student_progress page-->
    <link rel="stylesheet" href="../css/contact.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!--navigation bar is fixed to be at the top of the page and used in multiple pages, this is customized to the company-->
 <div id="navbar">
        <a href="../php/company_page.php">Home</a>
        <a href="../php/admin_job_page.php">Job Applications</a>
        <a href="../php/admin_requests.php">Consultation Requests</a>
        <a href="../php/admin_monitor.php">Monitoring</a>
        <a href="../php/admin_ratings.php">Ratings</a>
        <a href="../php/student_progress.php">Student Progress</a>
        <a href="../php/admin_users.php">Manage Users</a>
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading-->
<h1 class="centre-txt-main">Student Progress</h1>

<?php 
//looping through every row returned by the query and printing it out as a block of records
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<hr>";
    echo "<strong>Student:</strong> " . $row["student_name"] . "<br>";
    echo "<strong>Subject:</strong> " . $row["subject"] . "<br>";
    echo "<strong>Notes:</strong><br>" . $row["progress_notes"] . "<br>";
    echo "<strong>Date:</strong> " . $row["session_date"] . "<br>";
}
?>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>

</body>
</html>