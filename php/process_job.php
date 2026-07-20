<?php
try {
    //gets the database connection
    include("dbcon.php");
    //folder where the resumes will be stored
    $uploadDir= "uploads/";
    //creates uploads folder if it does not exist
    if(!is_dir($uploadDir)){
        mkdir($uploadDir);
    }
    //building filename that include a timestamp for uniqueness and avoids overwriting files if two resumes share the same name
    $resume=$uploadDir.time()."_".$_FILES["resume"]["name"];
    //moving file to uploads folder
    move_uploaded_file($_FILES["resume"]["tmp_name"],$resume);
    //insert the applicant's information and resume into the correct table
    $stmt= $conn->prepare("INSERT INTO job_applications (name, phone, email, message, resume_file)VALUES (?, ?, ?, ?, ?)");
    //binding form values into placeholders
    $stmt->execute([$_POST["name"], $_POST["phone"], $_POST["email"], $_POST["msg"], $resume]);
    //redirects applicant to a page that confirms submission
    header("Location: ../html/thankyou.html");
    exit();
} catch (PDOException $e){//if there is an exception, a message will be showed
    echo "Error: ".$e->getMessage();
}
?>