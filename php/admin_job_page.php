<?php
//starting PHP session
session_start();
//using the database connection file
include "dbcon.php";
?>
<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title>job requests</title>
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
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading-->
<h1 class="centre-txt-main">job applications</h1>
<br><br><br><br>
<!--table for job applications-->
<div class="table-flex">
<table class="table-customization">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Resume</th>
    <th>Message</th>
    <th>Date</th>
</tr>
<!--building the SQL query to get the job applications-->
<?php
$query = "SELECT * FROM job_applications";
//preparing the statement
$statement = $conn->prepare($query);
//running the query
$statement->execute();
//fetching all rows
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//only looping through the results if the query returned something
if ($result) {
    foreach ($result as $row) {
?>
<tr><!--rows for each application-->
    <td><?= $row['application_id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['phone']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><a href="<?= $row['resume_file']; ?>" target="_blank">View Resume</a></td>
    <td><?= $row['message']; ?></td>
    <td><?= $row['created_at']; ?></td>
</tr>
<?php
    }
} else {//if no applications are there then there is a message that displays this information
?>
<tr>
    <td colspan="7">No Record Found</td>
</tr>
<?php
}
?>
</table>
</div>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>
</body>

</html>