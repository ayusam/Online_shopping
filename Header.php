<!--Commit checkn-------------------------jiowef wiuh giwi iwwegfweg  iwefwbi hfw sikwifgfwfbi -->	
<html>
	<body>
		<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p> The right stuff. The right price<?php
				if(!isset($_SESSION['u_id'])){
					echo'<p>Login First to Purchase OR Sell Products</p>';
					
				}?></p>
			</div>
			
			
			<div class="agile-login">
				<ul>
					<li><a href="#">Welcome <?php if(isset($_SESSION['u_id'])){echo $_SESSION['u_name'];} else{echo 'User';}?> </a></li>
					
					
				</ul>-->
			
			
			
			<div class="product_list_header"> 
			<?php
			if(isset($_SESSION['isC'])){
				echo'<li class="dropdown">
										<a href="php/logout.php" class="dropdown-toggle" data-toggle="dropdown">Logout<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<li><a href="php/logout.php">logout</a></li>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>';
									}
				else if(isset($_SESSION['isS'])){
					echo'<li class="dropdown">
										<a href="php/logout.php" class="dropdown-toggle" data-toggle="dropdown">Logout<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<li><a href="php/logout.php">logout</a></li>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>';
					
					
				}else{
									echo '
			
			<li class="dropdown">		<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Create Acccount<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														
														
														
														<li><a href="Regcustomer.php">Customer</a></li>
														<li><a href="Regseller.php">Seller</a></li>
														
													
													</ul>
												</div>	
												
											</div>
										</ul>
									</li><li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														
														<li><a href="logincust.php">Customer</a></li>
														<li><a href="loginsel.php">Seller</a></li>
														
													</ul>
												</div>	
												
											</div>
										</ul>
								</li>
								
									';}
								if(isset($_SESSION['isC'])){
					echo '<form action="checkout.php"> 
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form> '; 			}
				else if(isset($_SESSION['isS'])){
					echo '<form action="seller.php"> 
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form> '; 			}
				?>
				
			</div></div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
			
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Sabka Bazaar</a></h1>
			</div>
		<div class="w3l_search">
			
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Electronics<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Dope Stuff here</h6>
														<li><a href="laptop.php">Laptops</a></li>
														<li><a href="mobile.php">Mobile Phones</a></li>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Packed Food<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Sugar, spice and everything nice</h6>
														<li><a href="chocolate.php">Chocolates and Sweets</a></li>
														<li><a href="cookies.php">Cookies and Biscuits</a></li>
													</ul>
												</div>
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Groceries<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Pure and Fresh</h6>
														<li><a href="dal_pul.php">Dals and Pulses</a></li>
														<li><a href="dry.php">Dry Fruits</a></li>
													</ul>
												</div>
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal Care<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All the care in the world</h6>
														<li><a href="man_watch.php">Mens Watch</a></li>
														<li><a href="woman_watch.php">Womens Watch</a></li>
														<li><a href="packs.php">Backpacks</a></li>
													</ul>
												</div>
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Household<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Everything for your house</h6>
														<li><a href="kitchen.php">Kitchenware</a></li>
													</ul>
												</div>
											</div>
										</ul>
									</li>
									<?php
									if(isset($_SESSION['isC'])){
									echo '
									<li>
										<a href="checkout.php">View your Cart</a>
									</li>
									<li>
										<a href="cust_history.php">Purchase History</a>
									</li>';
									}
									else if(isset($_SESSION['isS'])){
									echo '<li><a href="seller_history.php">My Products</a></li>';
									echo '<li><a href="seller.php">Add a product</a></li>';
									}
									?>
								</ul>
							</div>
							</nav>
			</div>
		</div>
	</body>
</html>