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
<title>Sabka Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
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

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Customer History</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<?php 		if(isset($_SESSION['isC'])){
	$no =1;
					include_once 'php/connect.php';
							$id = $_SESSION['u_id'];
						$sql = "select * from purchases where cust_id = '$id'";
						$result = mysqli_query($connect,$sql) or die();
						$resultno = mysqli_num_rows($result);
					echo '<h2>Your Purchasing History: '.$resultno.' Purchases</h2>
					<div class="checkout">
		<div class="container">
			
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Purchase ID</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Product ID</th>
						
							<th>Price</th>
							<th>Date</th>
							<th>Status</th>
							<th>Review</th>
						</tr>
	</thead>
	';
			while($row = mysqli_fetch_array($result)){
			
					
						$pid =$row['purchase_id'];
						$sql_2 = "Select * from	(ordered join purchases on ordered.purchase_id =purchases.purchase_id join product_info on product_info.product_id = ordered.product_id) where purchases.cust_id = '$id' and purchases.purchase_id= '$pid' ;";
						$result_2 = mysqli_query($connect,$sql_2) or die();
						
						while($row_2 = mysqli_fetch_array($result_2)){
	
					echo '
					<tr class="rem1">
						<td class="invert">'.$row['purchase_id'].'</td>
						<td class="invert-image"><a href="single.html"><img src="data:image;base64,'.$row_2['image'].'"/></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									
									<div class="entry value"><span>'.$row_2['quantity'].'</span></div>
									
								</div>
							</div>
						</td>
						<td class="invert">'.$row_2['product_name'].'</td>
						<td class="invert"> '.$row_2['product_id'].'</td>
						
						<td class="invert">'.$row_2['product_price'].'x'.$row_2['quantity'].'</td>
						<td class="invert">
						'.$row['date_pur'].'
						</td>
						<td class="invert">
						'.$row['status_pur'].'
						</td>
						<td class="invert">
							<a href="create_review.php">Review</a>
							
						</td>
						</tr>
						';
						$no = $no + 1;
			}}}else{echo'<p align="middle" style="font-size:20px"><b>Please login first</b></p>';}
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