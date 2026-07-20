<?php
session_start();
//checks so that only logged in company users can save progress entires
if (!isset($_SESSION["logged_in_user"])){
    header("Location: company_login.php");
    exit();
}

include("dbcon.php");//brings the connection
//preparing statement to save the student progress entry submitted from the company_page.php file
$stmt= $conn->prepare("INSERT INTO student_progress(student_name, subject, progress_notes)VALUES (?, ?, ?)");
//bind the submitted form values in the question mark placeholders, then runs the insert
$stmt->execute([$_POST["student_name"],$_POST["subject"],$_POST["progress_notes"]]);
//redirects user to company page after saving
header("Location: company_page.php");
exit();
?>