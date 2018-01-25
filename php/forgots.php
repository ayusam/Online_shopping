<?php
session_start();

if(isset($_POST['submit'])){
	include_once "connect.php";
$id = mysqli_real_escape_string($connect,$_POST['user']);
$pwd = mysqli_real_escape_string($connect,$_POST['pass']);

 //error handling
 if (empty($id) || empty($pwd)){
	header("Location: ../forgots.php?forgot=empty_field_error");
	exit();
 }else{
 $sql = "SELECT * from seller_info where email='$id'";
 $result = mysqli_query($connect,$sql) or die();
 echo "T";
 $resultcheck = mysqli_num_rows($result);
	if( $resultcheck < 1){
		header("Location: ../forgots.php?forgot=No_user_error");
	exit();
		
	}else{$hashedpass = password_hash($pwd,PASSWORD_DEFAULT);
			$sql_2 ="update seller_info set pwd ='$hashedpass' where email ='$id' ;";
			mysqli_query($connect,$sql_2) or die();
			
			header("Location: ../loginsel.php?Success");
	exit();
			
			}
		
		
	}
 
 }

else{
	header("Location: ../forgots.php?forgot");
	exit();
}
?>