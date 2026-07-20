<?php
session_start();
//getting the connection and class definition
include("dbcon.php");
include("Auth.php");
//creating auth object using the database connection
$auth=new Auth($conn);
$message="";//feediback message to show user
//only runs if the register button was clicked
if(isset($_POST['register'])){
    //creates a new account and returns the id if it was successful and lets the user know if it was created or the registration failed
    $userid=$auth->add_user($_POST['username'], $_POST['password'], $_POST['email']);
    if($userid){
        $message="An account was created.";
    }
    else{
        $message="Your registration failed.";
    }
}
//if the log in button was clicked this code will run
if(isset($_POST['login'])){
    //checks for the credentials and returns the id if it is valid or false if it is not
    $userid= $auth->authenticate($_POST['username'], $_POST['password']);
    //stores the id in the session and redirects user to the profile page
    if($userid){
        $auth->log_user_in($userid);
        header("Location:profile.php");
        exit;
    }else{//message displays incase the user submits something incorrect
        $message="Submitted an incorrect username or password.";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>register or log in</title>
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--stylesheet for about page but also used for the register page-->
    <link rel="stylesheet" href="../css/about.css">
    <!--stylesheet for login pages-->
    <link rel="stylesheet" href="../css/login.css">
    <!--default theme is the light theme-->
    <link rel="stylesheet" href="../css/light.css">
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
        <br><br><br><br><br><br>
     <div class="form-box">
    <div class="tape"></div>
        <div class="login-rect">
            <h1 class="form-title">Sign Up / Log In</h1>
            <form method="post">
                <!--the form accounts for logging in and registering, the button is the only difference-->
                <label class="small-text">Username:</label>
                <input type="text" name="username" required>
                <br><br>
                <label class="small-text">Email:</label>
                <input type="email" name="email" required>
                <br><br>
                <label class="small-text">Password:</label>
                <input type="password" name="password" required>
                <br><br><br><br><br>
                <button type="submit" name="register" class="my-button">Register</button>
                <br><br>
                <button type="submit" name="login" class="my-button">Login</button>
                <br><br><br><br><br>
                <p class="small-text"><a href="../html/index.html">← Back to Homepage</a></p>
            </form>
        </div>
    </div>
    <!--messages are displayed-->
    <p><?=$message?></p>

        <!--JavaScript file that handles all JavaScript required portions for the pages-->
    <script src="../js/java_work.js"></script>
    <!--footer showed on all page-->
    <footer>
        <img src="../img/logo.svg" id="copyright" width="50" alt="Matrix Tutoring Logo">
        <p>© 2026 Matrix Tutoring.</p>
    </footer>

</body>
</html>