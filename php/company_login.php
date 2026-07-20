<?php
//session starts to store data
session_start();
//using database connection and auth class definition
include("dbcon.php");
include("Auth.php");
//auth object and passing through the database connection
$auth=new Auth($conn);
//runs if the form has been submitted
if (isset($_POST['login'])){
    //returns user id if input is valid otherwise displays message saying it is not
    $userid=$auth->authenticate($_POST['username'], $_POST['password']);
    if ($userid){//if the login was successful then the user id is stored and user is redirected to the company page
        $_SESSION["logged_in_user"] = $userid;
        header("Location: company_page.php");
        exit();
    }else{
        $message="Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en-CA">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <!--main site-wide stylesheet-->
    <link rel="stylesheet" href="../css/pages_style.css">
    <!--style sheet geared towards the about page but used for the company log in-->
    <link rel="stylesheet" href="../css/about.css">
    <!--style sheet geared towards the log in pages-->
    <link rel="stylesheet" href="../css/login.css">
    <!--default theme is the light theme-->
    <link rel="stylesheet" href="../css/light.css">
    <!--for phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="background-look">
    <br><br><br><br><br><br>
     <div class="form-box">
        <div class="tape"></div>
        <div class="login-rect">
            <!--title-->
            <p class="form-title">Company Login</p>
            <!--the form submits back to the same file through POST-->
            <form action="company_login.php" method="POST">
                <br><br>
                <label class="small-text">Username</label><br>
                <input type="text" name="username" required><br><br><br>
                <label class="small-text">Password</label><br>
                <input type="password" name="password" required><br><br><br>
                <?php if (!empty($message)){ 
                    //if log in failed then it is displayed to the user
                    echo "<p>$message</p>"; 
                } ?>
                <!--the button name is used to check what is needed at the top of the file-->
                <button type="submit" name="login" class="my-button"><p class="small-text">Log In</p></button>
                <br><br><br>
                <p class="small-text">Looking to join our team? please refer to our application page.</p>
                <br>
                <p class="small-text"><a href="../html/index.html">← Back to Homepage</a></p>
            </form>
        </div>
    </div>


</body>

</html>