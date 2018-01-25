<?php 
$date = date("Y-m-d");

session_start();
include_once 'connect.php';

if(isset($_SESSION['u_id'])){
	$cid= $_SESSION['u_id'];
	$tum = 0;
	$add = mysqli_real_escape_string($connect,$_POST['add']);
	$name = mysqli_real_escape_string($connect,$_POST['name']);
	$ph = mysqli_real_escape_string($connect,$_POST['phone']);
	$sql = "select * from cart where cust_id ='$cid'";
	$result = mysqli_query($connect,$sql);
	$row_no = mysqli_num_rows($result);
	if($row_no == 0){
		
		 header("Location: ../checkout.php?Empty_cart");
							exit();
		
		
		
	}else{
		
		
		$sql_1="select * from product_info,cart where product_info.product_id = cart.product_id and cart.cust_id='$cid'";
		$result_1 = mysqli_query($connect,$sql_1);
		
		while($row_1 = mysqli_fetch_array($result_1)){
			if($row_1['quantity_available'] < $row_1['quantity']){
				$_SESSION['q1']= $row_1['quantity_available'];
				$_SESSION['q2']=$row_1['quantity'];
				$_SESSION['ro'] = $row_1['product_name'];
				$tum++;
				break;
			}
				
			
			
		}//////////page if not available
		if($tum >= 1){
		header("Location: ../Not_avail.php?");
		
		exit();
		}
		else{
		
		$sql = "select sum(price*quantity),cust_id from cart where cust_id ='$cid' group by cust_id";
		
		$result = mysqli_query($connect,$sql);
		$row_2 = mysqli_fetch_array($result);
			$amount = $row_2['sum(price*quantity)']*0.03 + $row_2['sum(price*quantity)'];
		$sql_2 = "Insert into purchases(cust_id,amount_pur,status_pur,date_pur,bill_address,bill_phone,bill_name) values('$cid','$amount','SHIP','$date','$add','$ph','$name');";
		echo 't';
		$result = mysqli_query($connect,$sql_2) or die();
			echo 't';

							header("Location: ../order_success.php");
							exit();		
		
		
		
	}
}}else{
	
	 header("Location: ../checkout.php");
	exit();
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>













?>