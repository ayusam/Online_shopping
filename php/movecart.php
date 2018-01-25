<?php 

session_start();
include_once 'connect.php';


if(isset($_POST['submit'])){
	$cid = mysqli_real_escape_string($connect,$_POST['cid']);
	$pid = mysqli_real_escape_string($connect,$_POST['pid']);
	$time = mysqli_real_escape_string($connect,$_POST['cid']);
	$quan = mysqli_real_escape_string($connect,$_POST['quan']);
	$name = mysqli_real_escape_string($connect,$_POST['name']);
	$price = mysqli_real_escape_string($connect,$_POST['amount']);
	
	if(empty($cid) || empty($pid) || empty($quan) || empty($name) || empty($price)){
			header("Location: ../{$_SERVER['HTTP_REFERER']}?error");								//// some error page require;
			exit();
		
	}
	else{
	$sql ="SELECT * FROM cart where product_id = '$pid' and cust_id='$cid';";
	echo"yes";
	$result =mysqli_query($connect,$sql) or die();
	echo"yes";
	if(mysqli_num_rows($result) == 0){
		$sql = "INSERT into cart(cust_id,product_id,quantity,name,price) values('$cid','$pid','$quan','$name','$price');";
		echo"yes";
		 mysqli_query($connect,$sql) or die();
		 echo"yes";
		 header("Location: {$_SERVER['HTTP_REFERER']}");
	exit();
		 
	}else{
		$sql = "update cart set quantity = quantity+1 where product_id= '$pid' and cust_id='$cid' ;";
		mysqli_query($connect,$sql) or die();	
		header("Location: {$_SERVER['HTTP_REFERER']}");
	exit();
	}
	
	
	
	
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit();
	}
	
}else{
	
	
	
	exit();
}









?>