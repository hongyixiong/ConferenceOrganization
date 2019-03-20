<!DOCTYPE html>
<?php
$movie_title = $_POST['movie_title'];
$complex_num = $_POST['cineplex_num'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$tmpmovie= $dbh->query("select * from movie where title = '$movie_title'");

$movie = $tmpmovie->fetch(PDO::FETCH_ASSOC);
$movie_id = $movie['movie_id'];
$sql = "select daily_showing.show_time from theatre, daily_showing where theatre.theatre_no = daily_showing.theatre_no and daily_showing.movie_id = $movie_id and theatre.complex_id = $complex_num";
$showtime = $dbh->query($sql) or die("die");
if(($showtime->rowCount())==0){
	header('location:user_page_order.php') or die("die");
}

session_start();
$_SESSION['movie'] = $movie_id;
?>
<html>
<head>
<title>Personal Order</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />


<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="user_page_profile.php"><div class="hm"><i class="profile"></i><i class="profile1"></i></i><i class="profile2"></i></div></a></li>
					<li><a class="active" href="user_page_order.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a href="user_page_review.php"><div class="bk"><i class="review"></i></i><i class="review1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">
		<div class="review-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
				</div>
				
				<div class="clearfix"></div>
			</div>
            
			<div class="reviews-section">
				<h3 class="head">Personal Order</h3>
            
					<div class="col-md-9 reviews-grids">
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="images/r4.jpg" alt="" /></a>
							</div>
							<div class="review-info">
								<div class="clearfix"></div>
								<p><font size = 8>
								<?php echo $movie_title;?>
								</font></p>
								<div class="clearfix"></div>
								<div class="yrw">
                                    <form action = "./includes/book.php" method = "post">
                                    <div class="dropdown-button">           			
										<select class="dropdown" name = "showtime" tabindex="5" data-settings='{"wrapperClass":"flat"}'>
										<option value="0">Choose the Showtime</option>	
										<?php
										foreach($showtime as $row){
											echo "<option>".$row['show_time']."<?option>";
										}
										?>
										</select>
									</div>
                                    <div class="dropdown-button">
										
										<input type = "text" name = "ticket_num" placeholder="num of tickets">
									</div>
									
                                </div>    
									
							<div class="clearfix"></div>
								<p class="info">plot_synopsis:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $movie['plot_synopsis'];?>
								</p>
								<p class="info">StartDate: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $movie['start_date'];?>
								</p>
                                <p class="info">EndDate: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
								<?php echo $movie['end_date'];?></p>
								<p class="info">Rating:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp; 
								<?php echo $movie['rating'];?></p>
								<p class="info">DURATION:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
								<?php echo $movie['running_time']." mins";?></p>
								
                                <div class="rtm text-center">
										<input type="submit" value="BOOK THE MOVIE">
								</div>
								</form>
									<div class="wt text-center">
										<a href="#">RENT THIS MOVIE</a>
									</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						
						
						
                            </div>
							<div class="clearfix"></div>
						</div>
					</div>
					<br><br><br><br><br><br>
                    <div class="footer">
                    <div class="copyright">
			<p>Copyright &copy; 2015.Company name All rights reserved. </p>
            </div>	
		</div>
			</div>
			<!---->
				
				<!---->

					</div>

					<div class="clearfix"></div>
          
	
        </div>
        </div>
        </div>
	<div class="clearfix"></div>
	</div>
</body>
</html>