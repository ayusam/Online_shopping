<?php
session_start();
include_once 'connect.php';

if(isset($_GET['pid'])){
	$pid = mysqli_real_escape_string($connect,$_GET['pid']);
	$cid = $_SESSION['u_id'];
	
	
	if(empty($pid) ||empty($cid)){
		header("Location: ../checkout.php?no_product_selected");
	exit();
		
	}else{
		$sql ="delete from cart where cust_id='$cid' and product_id ='$pid';";
		mysqli_query($connect,$sql)or die();
		header("Location: ../checkout.php?removed");
	exit();
		
	}
	
	
	
}else{
	
	header("Location: ../checkout.php");
	exit();
}




?>