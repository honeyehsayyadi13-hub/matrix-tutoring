<?php
//database connection settings for myweb server
$host="localhost";
$dbname="company_db";
$username="root";
$password="mysql";

try{//establishing PDO connection
    $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){//if the connection failed then a message will appear
    die("Database connection failed: " . $e->getMessage());
}


?>