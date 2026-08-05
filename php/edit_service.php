<?php
//starting session and connecting to database
session_start();
include("dbcon.php");

//stops the page if no service id was passed in the URL
if(!isset($_GET["id"])){
    die("No service selected");
}

//stores the id from the URL to use in the query
$id= $_GET["id"];
//prepares query to get the service that matches the id
$stmt=$conn->prepare("SELECT * FROM services WHERE service_id=?");
$stmt->execute([$id]);

//fetches the matching row
$service=$stmt->fetch();
//the page is stopped if there is no service with that id
if(!$service){
    die("Service not found");
}
//if the edit form has been submitted, this will run
if(isset($_POST["name"])){

//creates the update query to change the name
$stmt=$conn->prepare("UPDATE services SET name=? WHERE service_id=?");

//runs the update using the new name from the form and the id from the URL
$stmt->execute([$_POST["name"], $_GET["id"]]);

//when the update is done, the user gets sent back to the services page
header("Location: admin_services.php");
}
?>
<!DOCTYPE html>
<html lang="en-CA">
<head>
    <title>service editing</title>
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
    <br><br><br><br><br><br><br><br><br>
    <!--form that is used to edit the service names and submits back to this page through POST-->
    <!--the input is pre-filled with the current name of the service so the admin can edit it-->
    <form method="POST">
    <label>Services</label>
    <input name="name" value="<?php echo $service['name']; ?>">
    <button>Update Service</button>
</form>

    <!--JavaScript file that handles all JavaScript required portions for the pages-->
    <script src="../js/java_work.js"></script>
    <!--footer showed on all page-->
    <footer>
        <img src="../img/logo.svg" id="copyright" width="50" alt="Matrix Tutoring Logo">
        <p>© 2026 Matrix Tutoring.</p>
    </footer>

</body>

</html>