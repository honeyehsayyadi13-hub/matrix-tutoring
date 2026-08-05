<?php
//starting PHP session
session_start();
//using the database connection file
include "dbcon.php";
//query the requests table for all consultation requests and displaying the newest one first
$statement=$conn->query("SELECT * FROM requests ORDER BY created_at DESC");
//fetching all rows
$requests=$statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>consultation requests</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--style sheet geared towards the company pages but used for admin requests as well-->
    <link rel="stylesheet" href="../css/company.css">
    <!--style sheet geared towards the company pages but used for admin requests as well-->
    <link rel="stylesheet" href="../css/contact.css">
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
<h1 class="centre-txt-main">Consultation Requests</h1>
<!--table information that will be displayed-->
<div class="table-flex">
<table class="table-customization">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Parent</th>
        <th>Subject</th>
        <th>Style</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

<?php 
//looping through each consultation request and making one table row per submission
foreach($requests as $row) { ?>
<tr>
    <td><?= $row['request_id'] ?></td>
    <td><?= $row['student_name'] ?></td>
    <td><?= $row['parent_name'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['style'] ?></td>
    <td><?= $row['phone'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['message'] ?></td>
    <td><?= $row['created_at'] ?></td>
    <td><!--deleting link works through a URL and confirm() displays a popup asking the user to confirm before deleting-->
        <a href="delete_request.php?id=<?= $row['request_id'] ?>"onclick="return confirm('Do you want to delete this request?');">Delete</a>
    </td>

</tr>
<?php } ?>
</table>
</div>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>


</body>
</html>