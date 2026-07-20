<?php
//database connection settings for local server
$servername="localhost";
$username="root";
$password="mysql";
$database="company_db";

try{
    //creating a PDO connection with the above settings
    $conn=new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    //if the connection fails, a message is displayed
    echo "Connection Failed" .$e->getMessage();
}

?>