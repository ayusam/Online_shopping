<?php
session_start();

if(isset($_POST['submit'])){
	include_once "connect.php";
$id = mysqli_real_escape_string($connect,$_POST['user']);
$pwd = mysqli_real_escape_string($connect,$_POST['pass']);

 //error handling
 if (empty($id) || empty($pwd)){
	header("Location: ../forgotc.php?forgot=empty_field_error");
	exit();
 }else{
 $sql = "SELECT * from cust_info where email='$id'";
 $result = mysqli_query($connect,$sql) or die();
 $resultcheck = mysqli_num_rows($result);
	if( $resultcheck < 1){
		header("Location: ../forgotc.php?forgot=No_user_error");
	exit();
		
	}else{$hashedpass = password_hash($pwd,PASSWORD_DEFAULT);
			$sql_2 ="update cust_info set password ='$hashedpass' where email ='$id' ;";
			mysqli_query($connect,$sql_2) or die();
			header("Location: ../logincust.php?Success");
	exit();
			
			}
		
		
	}
 
 }

else{
	header("Location: ../forgotc.php?forgot");
	exit();
}
?>