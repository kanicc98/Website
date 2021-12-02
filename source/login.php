<?php
require("connect.php");

$username = $_POST["username"];
$password = $_POST["password"];

$SQL = "SELECT username, password
FROM `Employees`
WHERE username = \"$username\" AND password = \"$password\";";

$statement = $conn->prepare($SQL);

$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($results) > 0){
    header('Location: employee.php');
    die();
}
else{
    header('Location: employeelogin.php');
    die();
}
?>