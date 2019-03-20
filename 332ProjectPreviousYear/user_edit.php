<!DOCTYPE html>

<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
if(isset($_SESSION['account']))
{
	$customer= $dbh->query("select * from customer where account_no = $account");
	$phone= $dbh->query("select * from customer_phone where account_no = $account");
	
}
?>
<html>
<head>
<title>Personal Homepage</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a class="active" href="user_page_profile.html"><div class="hm"><i class="profile"></i><i class="profile1"></i></div></a></li>
					<li><a href="user_page_order.html"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a href="user_page_review.html"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">

		<div class="user_page_header">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p> Personal Homepage</p>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
				<h3 class="head">&nbsp;&nbsp;Account</h3>
					<div class="col-md-9 reviews-grids">
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="images/user1.jpg" alt="" /></a>
							</div>
							<div class="review-info">
								<a class="span">Personal Information</a>


								<p class="info">Account Number:&nbsp;&nbsp;&nbsp;<?php echo $account; ?></p>
								<form action="./user_editsave.php" method="post">
									<p class="info">First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="firstname" value="<?php foreach($customer as $row){echo $row["fname"];}?>" /> 
								
									</p>
									<p class="info">Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="lastname" value="<?php echo $row["lname"];?>" />
									</p>
									<p class="info">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="address" value="<?php echo $row["address"];?>" /> 
									</p>
								<p class="info">E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="e_mail" value="<?php echo $row["e_mail"];?>" />
										</p>
                                        
                                <p class="info">Password: &nbsp; 
                                    <input type="text" name="password" value="<?php echo $row["password"];?>"/> 
                                </p>
                                
                                <p class="info">Credit Card Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="creditcard_no" value="<?php echo $row["creditcard_no"];?>"/>
                                </p>
								<p class="info">Credit Card Expiry Date: &nbsp; 
                                    <input type="text" name="creditcard_expiry_date" value="<?php echo $row["creditcard_expiry_date"];?>"/>
                                </p>
                                
								<p class="info">Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="phone_number" value="<?php foreach($phone as $row){echo $row["phone_no"];}?>" /> 
								</p>
								<p class="info">Add Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="new_phone_number" /> 
									<button type="button"><a href="./user_page_profile.php">+</a></button>
								</p>
                                
								
                                
								

								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
						<div class="clearfix"></div>
						</div>

					</div>
			</div>
		</div><br><br><br>
        <div class="footer">
		
		<div class="copyright">
			<p>Copyright &copy; 2015.Company name All rights reserved. </p>
		</div>
	</div>	
		</div> <!-- end main-->

	
	</div>
	
	<div class="clearfix"></div>
</body>
</html>