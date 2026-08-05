<?php
//starting PHP session
session_start();
//using the database connection file
include "dbcon.php";
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
    <!--style sheet for contact but also used for monitor page-->
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
        <a href="../php/admin_services.php">Manage Services</a>
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading and subheading for monitoring the database-->
<h1 class="centre-txt-main">Website Monitoring</h1>
<h2 class="centre-txt">Status of the database.</h2>
<div class="contact-info">
<!--if the PDO connection is successful then online will be displayed-->
<?php
if($conn){
    echo "Database is online";
}else{
    echo "Database is offline";
}

//list of all the tables in the database to check
$tables=array("requests","service_ratings","users","student_progress");
//looping through each table and checking if it can be queried
foreach($tables as $table)
{   //getting the row count and grabs the single value from the result
    try{
        $count=$conn->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        echo "<p>$table is Online ($count records)</p>";
    }//if this fails then it is reported as offline
    catch(PDOException $e){
        echo "<p>$table is Offline</p>";
    }
}

?>
</div>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>

</body>
</html>