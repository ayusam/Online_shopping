<?php
session_start();
include_once 'connect.php';

if(isset($_POST['submit'])){
	
	
	
	
}else{
	 header("Location: {$_SERVER['HTTP_REFERER']}");
	exit();
	
	
	
}










?>