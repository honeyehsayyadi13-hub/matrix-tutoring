<?php
//starting PHP session
session_start();
//using the database connection file
include "dbcon.php";
//taking the service ratings from the database, displaying the latest submission first
$rates=$conn->query("SELECT * FROM service_ratings ORDER BY submission_date DESC")->fetchAll(PDO::FETCH_ASSOC);
//total number of ratings is submitted and used for calculations
$totVotes=count($rates);
?>

<!DOCTYPE html>
<html lang="en-CA">
<head>
    <title>Ratings</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--style sheet geared towards the company pages-->
    <link rel="stylesheet" href="../css/light.css">
    <!--default theme is the light theme-->
    <link rel="stylesheet" href="../css/company.css">
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
<h1 class="centre-txt-main">Rating Statistics</h1>
<div class="ratings-flex">
<?php
//looping from 5 stars to 1 star
for($i=5; $i>=1;$i--)
{
    //counting how many ratings match the current amount of stars
    $count=0;
    foreach($rates as $rating)
    {
        if($rating['rating']==$i){
            $count++;
        }
    }
    //calculating what percentage of total votes the current star amount represents, no division by 0 if there are no ratings
    if($totVotes>0){
        $percentage=($count / $totVotes)*100;
    }
    else{
        $percentage=0;
    }
    //printing a summary for the star level and rounding the percentage to 2 decimal places
    echo "<p class='rating-bar'>$i Star: $count votes (" . round($percentage,2) . "%)</p>";

}
?>
</div>

<hr>
<!--heading-->
<h2 class="centre-txt-main">User Comments</h2>
<?php
//looping through individual ratings and displaying them
foreach($rates as $row){
?>
<div class="comment-flex">
<strong>Rating:</strong>
<?= $row['rating'] ?> Stars
<br>
<strong>Comment:</strong>
<?= $row['message'] ?>
<br>
<strong>Date:</strong>
<?= $row['submission_date'] ?>
</div>
<?php
}
?>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>
</body>

</html>