<?php
//starting PHP session
session_start();
//using the database connection file
include ("dbcon.php");
//preparing and running a query to get the rows from the services table
$stmt= $conn->prepare("SELECT * FROM services");
$stmt->execute();
//stores the result to make a loop
$services= $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en-CA">
<head>
    <title>services</title>
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--style sheet geared towards the about us page but used for admin services-->
    <link rel="stylesheet" href="../css/about.css">
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
    <!--block of text to edit services-->
   <div class="form-box">
        <div class="tape"></div>
        <div class="form-rect">
                <p class="form-title">SERVICES</p>
                <ul><!--loops through every service returned from the database and displays it with an editing link-->
                    <div class="text-color"></div>
                    <?php foreach($services as $row): ?>
                    <li>
                        <?php echo $row['name']; ?>
                        <a href="edit_service.php?id=<?php echo $row['service_id']; ?>">
                           | Edit
                        </a>
                    </li>
                    <?php endforeach; ?>     
                </ul>   
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