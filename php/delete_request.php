<?php
//connecting to the company database using PDO
$pdo=new PDO("mysql:host=localhost;dbname=company_db", "root", "mysql");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//getting request id to delete
$id=$_GET["id"];
//binding the id and executing the delete
$stmt=$pdo->prepare("DELETE FROM requests WHERE request_id = ?");
//after deleting, the admin is sent back to the request list page
$stmt->execute([$id]);
header("Location: admin_requests.php");
exit();
?>