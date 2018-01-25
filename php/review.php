<?php 
session_start();
include_once 'connect.php';
if(isset($_POST['submit'])){
	if(isset($_SESSION['u_id'])){
	$cid =$_SESSION['u_id'];
	$prid =mysqli_real_escape_string($connect,$_POST['product_id']);
	$poid =mysqli_real_escape_string($connect,$_POST['purchase_id']);
	$type =mysqli_real_escape_string($connect,$_POST['type']);
	$review =mysqli_real_escape_string($connect,$_POST['review']);
	if(empty($prid) || empty($poid) || empty($type) || empty($review)){
		header("Location: ../create_review.php?Empty_field_error");
		exit();
		
		
	}else{
	$sql_1 = "Select * from ordered join purchases on ordered.purchase_id =purchases.purchase_id where ordered.product_id='$poid' and ordered.purchase_id='$prid' and purchases.cust_id='$cid' ";
	$result = mysqli_num_rows(mysqli_query($connect,$sql_1));
	if($result = 0){
		echo 'Wrong Details with respect to your account not such purchase found';
		
	}
else{
$sql = "Insert into review (cust_id,product_id,purchase_id,type,review)values('$cid','$prid','$poid','$type','$review')";
mysqli_query($connect,$sql) or die();
		header("Location: ../create_review.php?Review_submitted");
		exit();
	}}}else{
		echo'Login First';
	}
	
	
}else{
	header("Location: ../create_review.php");
	exit();
	
}




?>