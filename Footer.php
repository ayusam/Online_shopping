 

<html>
	<body>
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact Us</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Room 402-D and 408-D, <span>Hall of Residence.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="https://www.facebook.com/ayush.mantri.58">Ayush Mantri</a></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="https://www.facebook.com/aravind.ravikumar.7">Aravind Ravikumar</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>9496577495,7470517176</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="laptops.php">Laptops</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="mobile.php">Mobile Phones</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="chocolate.php">Chocholate and Sweets</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="cookies.php">Cookies and Biscuits</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="dal_pul.php">Dals and Pulses</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Catogory</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="man_watch.php">Mens Watches</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="dry.php">Fry Fruits</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="woman_watch.php">Womens Watches</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packs.php">Backpacks</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="kitchen.php">Kitchenwares</a></li>
					</ul>
				</div>
				<?php 
				
			

						if(isset($_SESSION['u_id'])){
				echo '<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> ';
					
					if(isset($_SESSION['isC'])){
						echo '<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="cust_history.php">Purchase History</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.php">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="create_review.php">Write a Review</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="php/logout.php">Logout</a></li>' ;
					}
					else if(isset($_SESSION['isS'])){
						echo '<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="seller_history.php"> My Products</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="seller.php">Add Product</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="php/logout.php">Logout</a></li>' ;
					}
						
					echo '</ul>
						</div>';}?>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2017 Sabka Bazaar. All rights reserved | Design by Ayush and Aravind</p>
			</div>
		</div>
		
	</div>	
	</body>
</html>