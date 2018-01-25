<?php
session_start();
if(isset($_POST['submit'])){
	include_once  'connect.php';
	$selid = $_SESSION['u_id'];
	$pid =$_SESSION['pid'];
	$quan =mysqli_real_escape_string($connect,$_POST['quan']);
	$des =mysqli_real_escape_string($connect,$_POST['des']);
		$imagename=$_FILES["my_image"]["name"]; 
	$imagesize=$_FILES["my_image"]["size"];
//Get the content of the image and then add slashes to it 
	$imagetmp = addslashes($_FILES["my_image"]["tmp_name"]);
	$imagetmp = file_get_contents($imagetmp);
	$imagetmp = base64_encode($imagetmp);
	//error handlers
	//check for empty fields
	if((empty($name)||empty($price)||empty($quan)||empty($des))||empty($imagename)||empty($imagesize) ||empty($type)){
	echo "Please fill all entries";
	header("Location: ../seller.php?Product_field=empty");
	exit();
	} else{
		$sql = "select * from product_info where product_id = '$pid'";
		
		
		$row = mysqli_num_rows(mysqli_query($connect,$sql));
		if($row =0){
			echo'No Such Product to update';
		}
		
	else{
		$inserttt = "update product_info set quantity_available='$quan',description='$des',image='$imagetmp',imagename='$imagename' where product_id = '$pid'";
		mysqli_query($connect,$inserttt) or die();
		
		header("Location: ../seller_history.php?Product_updates_success");
			exit();
	}
	
	}
}else{
		header("Location: ../php/updatepro.php");
			exit();
		
	}






?>