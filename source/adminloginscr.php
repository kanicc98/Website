<?php
require("connect.php");

$username = $_POST["username"];
$password = $_POST["password"];

$SQL = "SELECT username, password
FROM `Admins`
WHERE username = \"$username\" AND password = \"$password\";";

$statement = $conn->prepare($SQL);

$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($results) > 0){
    header('Location: admin.php');
    die();
}
else{
    header('Location: adminlogin.php');
    die();
}
