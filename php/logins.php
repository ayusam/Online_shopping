<?php
session_start();

if(isset($_POST['submit'])){
	include_once "connect.php";
$id = mysqli_real_escape_string($connect,$_POST['user']);
$pwd = mysqli_real_escape_string($connect,$_POST['pass']);

 //error handling
 if (empty($id) || empty($pwd)){
	header("Location: ../loginsel.php?login=empty_field_error");
	exit();
 }else{
 $sql = "SELECT * from seller_info where email='$id'";
 $result = mysqli_query($connect,$sql) or die();
 $resultcheck = mysqli_num_rows($result);
	if( $resultcheck < 1){
		header("Location: ../loginsel.php?login=No_user_error");
	exit();
		
	}else{
			$row = mysqli_fetch_assoc($result);
			
			$hashedPassCheck= password_verify($pwd,$row['pwd']);
			if($hashedPassCheck == false){
				header("Location: ../loginsel.php?login=wrong_password_error");
				exit();
			} else if($hashedPassCheck == true){
				$_SESSION['u_id']= $row['seller_id'];
				$_SESSION['u_name']= $row['owner'];
				$_SESSION['u_phone']= $row['phone_no'];
				$_SESSION['u_email']= $row['email'];
				$_SESSION['u_dob']= $row['dob'];
				$_SESSION['isS'] = 1;
				header("Location: ../index.php?login=success");
				exit();
				
			}
		
		
	}
 
 }

}else{
	header("Location: ../loginsel.php?login");
	exit();
}
?>