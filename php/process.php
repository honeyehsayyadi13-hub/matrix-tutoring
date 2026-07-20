<?php
session_start();

try {
    //using the database connection
    include("dbcon.php");

    //grabbing the currently logged in user's id from session and links the request to the company account that submitted it
    $user_id= $_SESSION["logged_in_user"];

    //preparing insert statement to save request using plaeholders
    $stmt= $conn->prepare("INSERT INTO requests (user_id, student_name, parent_name, subject, style, phone, email, message)VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    //binding form values in place of the question mark placeholders and runs insert
    $stmt->execute([$user_id,$_POST["student"],$_POST["parent"],$_POST["subject"],$_POST["style"],$_POST["phone"],$_POST["email"],$_POST["msg"]]);
    //redirects user to their profile page
    header("Location: ../php/profile.php");
    exit();


} catch(PDOException $e){//if something fails, an error message is displayed
    echo "Database error: " . $e->getMessage();

}

?>