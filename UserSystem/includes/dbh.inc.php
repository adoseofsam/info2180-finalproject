<?php
$serverName ="localhost";
$dbUsername ="admin";
$dBPassword ="My_Password123";
$dBName ="BugMe";


$conn = mysqli_cconnect($serverName , $dbUsername , $dBPassword , $dBName  );

if (!$conn){
    die("Connection Failed: " . mysqli_cconnect_error());
}

?>
