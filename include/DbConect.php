<!--  
 - Created by Apache NetBeans IDE 11.2
 - By: shaimaa Raed Zakout
 - Date: 10/6/2020
 - Time: 8:00 am 
-->
<?php
$dbServer = "localhost";
$dbName = "carsystem";
$dbPassword = "";
$dbUserName = "root";

$connect = mysqli_connect($dbServer, $dbUserName, $dbPassword, $dbName);
if (!$connect) {
    echo "Connecting error :" . mysqli_connect_error();
}

