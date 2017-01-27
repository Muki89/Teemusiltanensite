<?php
session_start();

$servername = "213.171.200.91";
$username = "teemusiltanencom";
$password = "yno3YZ8&vC";
$dbname = "teemusiltanencom";

try {
    $conn = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("SET NAMES utf8");	

}
catch(PDOException $e)
{
     error_log("Database connect failed! " . $e, 3, "/tmp/error_log.log");
}

?>