<!DOCTYPE html>

<html>
<head>
<title>Personal Order</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- stylesheet -->
<link href="css/Templatestyle.css" rel="stylesheet" type="text/css" media="all" />


<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a class="active" href="admin_member.php"><div class="hm"><i class="profile1"></i><i class="profile2"></i></div></a></li>
					<li><a  href="admin_Movie.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a href="admin_theatre.php"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">
		<div class="review-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Administrator</p>
				</div>	
				<div class="clearfix"></div>
			</div>


            <div class="reviews-section">
                <h3 class ="head">Rental History</h3><br>
                    <table>
						<tr><th>account_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>rent time&nbsp;&nbsp;&nbsp;&nbsp;</th><th>movie_id&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
						<?php
							session_start();
							$account = $_SESSION['account'];
							$member_account = $_POST['account_num'];
							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
							$rows = $dbh->query("select * from rental where account_no = '$member_account'") or die("rental fail");
							foreach($rows as $row) {
								$movie_id = $row["movie_id"];
								echo 
								"<tr><td>".$row["account_no"]."</td><td>".$row["time"]."</td><td >".$movie_id."</td></tr>";			
							}
						?>
					</table>	
             </div>


             <div class="reviews-section">
                <h3 class ="head">Reservation History</h3><br>
                    <table>
						<tr><th>account_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>movie_id&nbsp;&nbsp;&nbsp;&nbsp;</th><th>theatre_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>ticket_num&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>show_time&nbsp;&nbsp;&nbsp;&nbsp;</th><th>time&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
						<?php
							$member_account = $_POST['account_num'];
							$rows = $dbh->query("select * from reservation where account_no = '$member_account'and state = 'approved'") or die("rental fail");
							foreach($rows as $row) {
								echo 
								"<tr><td>".$row["account_no"]."</td><td>".$row["movie_id"]."</td><td>".$row["theatre_no"]."</td><td>".$row["ticket_num"]."</td><td >".$row["show_time"]."</td><td>".$row["time"]."</td></tr>";			
							}

						?>
						</table>	
                </div>
				<div class="clearfix"></div><br><br>
		



		</div>

        <div class="footer">
    
			<div class="copyright">
				<p>Copyright &copy; 2015.Company name All rights reserved. </p>
			</div>
		</div>	
        </div>
    </div>
	<div class="clearfix"></div>
</body>
</html>