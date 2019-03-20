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
<title>Personal Profile</title>
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
					
                    <li><a class="active" href="user_page_profile.php"><div class="hm"><i class="profile1"></i></i><i class="profile2"></i></div></a></li>
					<li><a href="user_page_order.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a href="user_page_review.php"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">

		<div class="user_page_header">
			<div class="top-header">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p>Personal Homepage</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
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
								<p class="info">First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
									foreach($customer as $row)
									{
										echo $row["fname"];
									}
									?>
								</p>
								<p class="info">Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
										echo $row["lname"];
									?>
								</p>
								<p class="info">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
										echo $row["address"];
									?>
								</p>
								<p class="info">E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
										echo $row["e_mail"];
									?>
								</p>
								
								<p class="info">Password: &nbsp; ******* </p>
								<p class="info">Credit Card Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ******* </p>
								<p class="info">Credit Card Expiry Date: &nbsp; ******* </p>
                                <p class="info">Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                        foreach($phone as $row)
                                        {
                                            echo $row["phone_no"];
                                        }
									?>
								</p>
								<div class="rtm text-center">
									<a href="./user_edit.php">Edit Your Profile</a>
								</div>

								

							</div>
						<div class="clearfix"></div>
						</div>

					</div>
			</div>
		</div><br><br><br>
        <div class="footer">
		
		<div class="copyright">
			<p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
		</div>
	</div>
		</div> <!-- end main-->

		
	</div>
	
	<div class="clearfix"></div>
</body>
</html>
