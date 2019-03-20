<!DOCTYPE html>
<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
?>
<html>
<head>
<title>Admin Complex Theatre</title>
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
					<li><a href="admin_member.php"><div class="hm"><i class="member"></i><i class="member1"></i></div></a></li>
					<li><a href="admin_Movie.php"><div class="cat"><i class="movie"></i><i class="movie1"></i></div></a></li>
					<li><a class = "active" href="admin_theatre.php"><div class="bk"><i class="theatre"></i></i><i class="theatre1"></i></div></a></li>
				</ul>
		</div>	

		<div class="main">
			<div class="top-header span_top">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p>Manage Complex Theatre</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>
				
				<div class="clearfix"></div>
			</div>
			 <div class="reviews-section">
				<h3 class="head">Update Complex</h3>
					<div class="col-md-9 reviews-grids">
						<div class="review-info">

								<form action="./complex_update.php" method="post">
									<p class="info">Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="ucomplex_no" value="" /> 
									</p>
                                    <p class="info">Theatre Num:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="utheatre_no" value="" /> 
									</p>
                                    <p class="info">Complex Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="ucomplex_name" value="" /> 
									</p>
                                    <p class="info">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="uaddress" value="" /> 
									</p>
                                    <p class="info">Phone No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="uphone_no" value="" /> 
									</p>
                                    

								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
							<div class="clearfix"></div>
						
						
					</div>
                    </div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>      
            <div class="reviews-section">
				<h3 class="head">Update Theatre</h3>
					<div class="col-md-9 reviews-grids">
						<div class="review-info">

								<form action="./theatre_update.php" method="post">
									<p class="info">Theatre Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="xtheatre_no" value="" /> 
									</p>
                                    <p class="info">Max Seat Num:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="xseats_no" value="" /> 
									</p>
                                    <p class="info">Screen Size:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="xscreen_size" value="" /> 
									</p>
                                  

								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
							<div class="clearfix"></div>
							
						
						
					</div>
					
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
            
            <div class="reviews-section">
				<h3 class="head">Most Popular Complex</h3><br>
					<div class="col-md-9 reviews-grids" >
					<?php
						$sql = "select complex_id, sum(profit) as complex_profit from theatre group by complex_id order by complex_profit DESC";
						$popular_complex = $dbh->query($sql);
						$most_popular=$popular_complex->fetch(PDO::FETCH_ASSOC);
						echo "<font size = 6>the most popular theatre complex is: complex ".$most_popular['complex_id']."</font>";
						
						?>
					</div>
			<div class="clearfix"></div><br><br>
					
					
			</div><br><br>
			<!---->
				
				<!---->
						
            <div class="footer">
    
                <div class="copyright">
                    <p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
                </div>
            </div>	
         </div>
         </div>   
      
       
	<div class="clearfix"></div>
	</div>
</body>
</html>