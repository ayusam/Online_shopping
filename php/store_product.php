<?php
session_start();
if(isset($_POST['submit'])){
	include_once  'connect.php';
	$selid = $_SESSION['u_id'];
	$name =mysqli_real_escape_string($connect,$_POST['name']);
	$price =mysqli_real_escape_string($connect,$_POST['price']);
	$quan =mysqli_real_escape_string($connect,$_POST['quan']);
	$des =mysqli_real_escape_string($connect,$_POST['des']);
	$type =mysqli_real_escape_string($connect,$_POST['type']);
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
		
		
	
		$inserttt = "INSERT INTO product_info(product_name,type,quantity_available,product_price,description,image,imagename,seller_id) VALUES('$name','$type','$quan','$price','$des','$imagetmp','$imagename','$selid')";
		mysqli_query($connect,$inserttt) or die();
		
		header("Location: ../seller.php?Product_added_success");
			exit();
	
	}
}else{
		header("Location: ../seller.php");
			exit();
		
	}






?>