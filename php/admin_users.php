<?php
//starting PHP session
session_start();
//using the database connection file
include "dbcon.php";
//disables user if when the text is clicked on
if(isset($_GET['disable'])){

    $id=$_GET['disable'];
    //prepared statement with placeholder
    $stmt=$conn->prepare("UPDATE users SET active=0 WHERE id=?");
    //binding $id into the palceholder and running the upadte
    $stmt->execute([$id]);
    //redirecting back to the page so the table changes accordingly
    header("Location: admin_users.php");
    exit();
}


//enables user and triggered when the enable link is clicked
if(isset($_GET['enable'])){

    $id=$_GET['enable'];
    $stmt=$conn->prepare("UPDATE users SET active=1 WHERE id=?");
    $stmt->execute([$id]);
    //redirection to avoid duplicates
    header("Location: admin_users.php");
    exit();
}


//getting users and runs after disable/enable check and pulls users so the table can display the status for all accounts
$stmt=$conn->prepare("SELECT * FROM users");
$stmt->execute();
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en-CA">
<head>
<title>Manage Users</title>
<!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
<!--main site-wide stylesheet-->
<link rel="stylesheet" href="../css/pages_style.css">
<!--style sheet geared towards the company pages-->
<link rel="stylesheet" href="../css/company.css">
<!--default theme is the light theme-->
<link rel="stylesheet" href="../css/light.css">
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
<h1 class="centre-txt-main">Manage User Accounts</h1>
<!--table for current users-->
<div class="table-flex">
<table class="table-customization">
<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php foreach($users as $user){ 
    //looping through every user and bulding a table row for each account
    ?>

<tr>
<td>
<?= $user['id']; ?>
</td>
<td>
<?= $user['username']; ?>
</td>
<td>
<?= $user['email']; ?>
</td>
<td>
<?php
//active flag as 1 or 0
if($user['active']==1){
    echo "Active";
}
else{
    echo "Disabled";
}
?>
</td>
<td>
<?php 
//active users get a disable link and disabled users get an enable link
if($user['active']==1){ ?>
<a href="?disable=<?= $user['id']; ?>">Disable</a>
<?php }else{ ?>
<a href="?enable=<?= $user['id']; ?>">Enable</a>
<?php } ?>
</td>
</tr>
<?php } ?>

</table>

</div>
<!--JavaScript file that handles all JavaScript required portions for the pages-->
<script src="../js/java_work.js"></script>

</body>

</html>