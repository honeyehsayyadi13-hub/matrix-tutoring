<?php
session_start();//checking for login status to resume session
//bringing in connection and Auth class definition
include("dbcon.php");
include("Auth.php");

$auth= new Auth($conn);//auth object from database connection

$user_id= $auth->logged_in_user();//checking for a logged in user

if (!$user_id){//redirection if they are not logged in
    header("Location: user_login.php");
    exit();
}
//looking for username of the user for the header
$stmt= $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user= $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <!--website icon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.svg">
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--stylesheet for contact page but also used for the profile page-->
    <link rel="stylesheet" href="../css/contact.css">
    <!--default theme is the light theme-->
    <link id="theme-style" rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="background-look">
    
    <div id="navbar">
        <!--theme switches through buttons, changeTheme() function in java_work.js swaps the theme using #theme-style-->
        <button onclick="changeTheme('../css/light.css')">Light Mode</button>
        <button onclick="changeTheme('../css/dark.css')">Dark Mode</button>
        <button onclick="changeTheme('../css/pastel.css')">Pastel Mode</button>
        <img src="../img/logo.svg" id="logo" width="70">
    </div>
<!--heading that also displays the user's username-->
<h1 class="centre-txt-main">Welcome, <?php echo htmlspecialchars($user["username"]); ?>!</h1>

<div class="contact-info">
<!--links that will send user to book a form or to log out-->
    <a href="form.php" class="my-button">Book Consultation</a>
    <br><br><br>

    <a href="logout.php" class="my-button">Log Out</a>

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