<?php
if(isset($_POST['submit'])){
	include_once  'connect.php';
	
	$name =mysqli_real_escape_string($connect,$_POST['name']);
	$gender =mysqli_real_escape_string($connect,$_POST['gender']);
	$dob =mysqli_real_escape_string($connect,$_POST['dob']);
	$phone =mysqli_real_escape_string($connect,$_POST['phone']);
	$address =mysqli_real_escape_string($connect,$_POST['add']);
	$email =mysqli_real_escape_string($connect,$_POST['email']);
	$pass =mysqli_real_escape_string($connect,$_POST['pass']);
	$passcon =mysqli_real_escape_string($connect,$_POST['passcon']);
	
	//error handlers
	//check for empty fields
	if(empty($name)||empty($gender)||empty($dob)||empty($phone)||empty($address)||empty($email)||empty($pass)||empty($passcon)){
	echo "Please fill all entries";
	header("Location: ../Regcustomer.html?signup=empty");
	exit();
	} else{$num_length = strlen((string)$phone);
if($num_length != 10 || !is_numeric($phone) ){
   header("Location: ../Regcustomer.php?signup=checkphoneno");
			exit();
} else {
    


		
		if($gender != "Male" && $gender && "Female"&& $gender != "Others"){
			echo "Please fill specified entries properly";
			header("Location: ../Regcustomer.php?signup=checkgender");
			exit();
		} else {// check valid email
		$sql = "SELECT * FROM cust_info WHERE email='$email'";
		$result = mysqli_query($connect,$sql);
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck >0){
			echo"Email already exist";
			header("Location: ../Regcustomer.php?signup=checkEMAILalreadyExists");
			exit();
			
		}else{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo"Enter proper Email";
			header("Location: ../Regcustomer.php?signup=checkEMAIL");
			exit();
		}else{
			if($pass != $passcon){
				echo"Both entered pass does not match";
				
				
			}else{
				//hashing the pass
				$hashedpass = password_hash($pass,PASSWORD_DEFAULT);
				$sql = "INSERT INTO cust_info(name,dob,gender,phoneno,address,password,email) values('$name','$dob','$gender','$phone','$address','$hashedpass','$email')";
				mysqli_query($connect,$sql);
				header("Location: ../Regcustomer.php?signup=Success");
			exit();
			}
			
		}
		}
}
		}
	}
	
	
	
	}else{
		header("Location: ../Regcustomer.php");
			exit();
		
	}






?>