<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<?php
		include_once('Header.php');
	?>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<?php 		if(isset($_SESSION['u_id'])){
					include_once 'php/connect.php';
							$id = $_SESSION['u_id'];
						$sql = "Select * from cart where cust_id = '$id' ;";
						$result = mysqli_query($connect,$sql) or die();
						$resultno = mysqli_num_rows($result);
	echo'<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span>'.$resultno.' Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
	</thead>';
					
						
						$no = 1;
						while($row = mysqli_fetch_array($result)){
							$pid =$row['product_id'];
							$sql_2 = "Select * from product_info where product_id = '$pid';";
							$result_2 = mysqli_query($connect,$sql_2) or die();
							$resultno = mysqli_num_rows($result_2);
							$row_2 = mysqli_fetch_array($result_2);
					echo '
					<tr class="rem1">
						<td class="invert">'.$no.'</td>
						<td class="invert-image"><a href="single.html"><img src="data:image;base64,'.$row_2['image'].'"/></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>'.$row['quantity'].'</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">'.$row['name'].'</td>
						
						<td class="invert">'.$row['price'].'x'.$row['quantity'].'</td>
						<td class="invert">
							<a href="php/remove.php?pid='.$pid.'">Remove</a>
							
						</td>
						</tr>
						';
						$no = $no + 1;
	}}else{echo'<p align="middle" style="font-size:20px"><b>Please login first</b></p>';}
						?>
						<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			<?php if(isset($_SESSION['u_id'])){
					include_once 'php/connect.php';
							$id = $_SESSION['u_id'];
						$sql = "Select * from cart where cust_id = '$id' ;";
						$result = mysqli_query($connect,$sql) or die();
						$resultno = mysqli_num_rows($result);
						
						echo '
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>';
					while($row = mysqli_fetch_array($result)){
					echo'
						<li>'.$row['name'].' <i>:</i> <span>'.$row['price']*$row['quantity'].'</span></li>
						
						';
					}
					$sql_3 = "Select sum(price*quantity) as t from cart where cust_id = '$id' group by cust_id ;";
						$result_3 = mysqli_query($connect,$sql_3) or die();
						
						$row_3 = mysqli_fetch_assoc($result_3);
						$sql_4="Select * from loyal_member where loyal_id='$id';";
						$result_4 = mysqli_query($connect,$sql_4) or die();
						$rownum = mysqli_num_rows($result_4);
						
						if($rownum > 0){
						echo'<li>Total Service Charges <i>-</i> <span>0%</span></li>';
						$tax = $row_3['t'];
						}else{
						echo'<li>Total Service Charges <i>-</i> <span>3%</span></li>';
						$tax = $row_3['t']+0.03*$row_3['t'];}
						echo'<li>Total<i>-</i> <span>'.$tax.'</span></li>
					</ul>
			</div>';}
				?>
				
				<div class="checkout-right-basket">
					<a href="bill_detail.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Checkout</a>
				</div>
				<div class="checkout-right-basket">
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
<!-- //footer -->
<?php
	include_once('Footer.php');	
?>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>