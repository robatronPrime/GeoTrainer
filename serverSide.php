<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE exercise (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
exName VARCHAR(30) NOT NULL,
exType VARCHAR(30) NOT NULL,
exVlaOne VARCHAR(30) NOT NULL,
exValTwo VARCHAR(30) NOT NULL,
exValThree VARCHAR(30) NOT NULL,
inOne INT(6) NOT NULL,
inTwo INT(6) NOT NULL,
inThree INT(6) NOT NULL,
desc VARCHAR(120) NOT NULL
)";
?>

