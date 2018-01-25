<?php
if(isset($_POST['submit'])){
	include_once  'connect.php';
	
	$name =mysqli_real_escape_string($connect,$_POST['name']);
	$gender =mysqli_real_escape_string($connect,$_POST['gender']);
	$dob =mysqli_real_escape_string($connect,$_POST['dob']);
	$cname =mysqli_real_escape_string($connect,$_POST['cname']);
	$gst =mysqli_real_escape_string($connect,$_POST['gst']);
	$phone =mysqli_real_escape_string($connect,$_POST['phone']);
	$address =mysqli_real_escape_string($connect,$_POST['add']);
	$email =mysqli_real_escape_string($connect,$_POST['email']);
	$pass =mysqli_real_escape_string($connect,$_POST['pass']);
	$passcon =mysqli_real_escape_string($connect,$_POST['passcon']);
	
	//error handlers
	//check for empty fields
	if(empty($name)||empty($gender)||empty($dob)||empty($phone)||empty($address)||empty($email)||empty($pass)||empty($passcon) || empty($gst) || empty($cname)){
	echo "Please fill all entries";
	header("Location: ../Regseller.php?signup=empty");
	exit();
	} else{$num_length = strlen((string)$phone);
if($num_length != 10 || !is_numeric($phone) ){
   header("Location: ../Regseller.php?signup=checkphoneno");
			exit();
} else {
		if($gender != "Male" && $gender && "Female"&& $gender != "Others"){
			echo "Please fill specified entries properly";
			header("Location: ../Regseller.php?signup=checkgender");
			exit();
		} else {// check valid email
		$sql = "SELECT * FROM seller_info WHERE email='$email'";
		$result = mysqli_query($connect,$sql);
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck >0){
			echo"Email already exist";
			header("Location: ../Regseller.php?signup=checkEMAILalreadyExists");
			exit();
			
		}else{
			$sql = "SELECT * FROM seller_info WHERE gst_no='$gst'";
		$result = mysqli_query($connect,$sql) or die();
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck >0){
			
			header("Location: ../Regseller.php?signup=checkCompany_Aready_register_check_gst_no");
			exit();
		}
			else{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo"Enter proper Email";
			header("Location: ../Regseller.php?signup=checkEMAIL");
			exit();
		}else{
			if($pass != $passcon){
				echo"Both entered pass does not match";
				
				
			}else{
				//hashing the pass
				$hashedpass = password_hash($pass,PASSWORD_DEFAULT);
				
				$sql_2 = "INSERT INTO seller_info(owner,dob,gender,company_name,gst_no,phone_no,address,email,pwd) values('$name','$dob','$gender','$cname','$gst','$phone','$address','$email'	,'$hashedpass')";
				mysqli_query($connect,$sql_2) or die();
				header("Location: ../Regseller.php?signup=Success");
			exit();
			}
			
		}
		}
		}
}
		}
	}
	
	
	
	}else{
		header("Location: ../Regseller.php");
			exit();
		
	}






?>