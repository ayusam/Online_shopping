<?php
session_start();
include_once 'connect.php';

if(isset($_GET['pid'])){
	$pid = mysqli_real_escape_string($connect,$_GET['pid']);
	$cid = $_SESSION['u_id'];
	
	
	if(empty($pid) ||empty($cid)){
		header("Location: ../seller_history.php?no_product_selected");
	exit();
		
	}else{
		$sql ="update  product_info set quantity_available = 0 where seller_id='$cid' and product_id ='$pid';";
				mysqli_query($connect,$sql)or die(); echo "T";
		header("Location: ../seller_history.php?removed");
	exit();
		
	}
	
	
	
}else{
	
	header("Location: ../seller_history.php");
	exit();
}




?>