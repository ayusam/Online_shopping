<?php
$server ='localhost';
$user ='root';
$pass = '';
$db ='ecommerce';
$connect =new mysqli($server,$user,$pass,$db);
if($connect->connect_error){
	die("connection failed".$connect->connect_error);
} 
?>