<!DOCTYPE html>
<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
?>
<html>
<head>
<title>Personal Profile</title>
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
					<li><a href="admin_member.php"><i class="profile"></i><i class="profile1"></i></a></li>
					<li><a class="active" href="admin_movie.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a href="admin_theatre.php"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">

		<div class="user_page_header">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p> Personal Homepage</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>

				<div class="clearfix"></div>
			</div>



            <div class="reviews-section">
                <h3 class ="head">All Movies</h3><br>
                    <table>
						<tr><th>moive id&nbsp;&nbsp;&nbsp;&nbsp;</th><th>title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>running time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>plot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>start date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>end date</th></tr>
						<?php
							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

							$rows = $dbh->query("select * from movie");
							foreach($rows as $row) {
    
								echo 
								"<tr><td>".$row["movie_id"]."</td><td>".$row["title"]."</td><td >".$row["running_time"]."</td><td>".$row["rating"]."</td><td>".$row["plot_synopsis"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td></tr>";			
							}
						?>
						</table>
						
                </div>

			<div class="reviews-section">
				<h3 class="head">Add a New Movie</h3>
					<div class="col-md-9 reviews-grids">
							<div class="review-info">

								<form action="./movie_insert.php" method="post">
									<p class="info">Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="movie_id" value="" /> 
									</p>
                                     <p class="info">Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="complex_no" value="" /> 
									</p>
                                    <p class="info">Theater No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="theater_no" value="" /> 
									</p>
                                    <p class="info">Left seat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="left_seat" value="" /> 
									</p>
                                    <p class="info">Show time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="show_time" value="" /> 
									</p>
									<p class="info">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="movie_title" value="" />
									</p>
									<p class="info">Running Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="duration" value="" /> 
									</p>
								<p class="info">Plot:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="plot" value="" />
										</p>
								<p class="info">Rating:&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="rating" value="" /> 
								</p>
								<p class="info">Start date:&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="start_date" /> 
								</p>
								<p class="info">End date: &nbsp;
                                    <input type="text" name="end_date" />    
                                </p>
								

								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
						<div class="clearfix"></div>
						</div>

					</div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    
                    
            <div class="reviews-section">
				<h3 class="head">Update the movie</h3>
					<div class="col-md-9 reviews-grids">
							<div class="review-info">

								<form action="./movie_update.php" method="post">
									<p class="info">Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="nmovie_id" value="" /> 
									</p>
                                    <p class="info">Previous Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="npcomplex_no" value="" /> 
									</p>
                                    <p class="info">New Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="ncomplex_no" value="" /> 
									</p>
                                    <p class="info">Previous Theater No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="nptheater_no" value="" /> 
									</p>
                                    <p class="info">New Theater No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="ntheater_no" value="" /> 
									</p>
                                    <p class="info">Previous Show time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="npshow_time" value="" /> 
									</p>
                                    <p class="info">New Show time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="nshow_time" value="" /> 
									</p>
                                    <p class="info">Left seat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="nleft_seat" value="" /> 
									</p>

								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
						<div class="clearfix"></div>
						</div>

					</div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            
            <div class="reviews-section">
				<h3 class="head">Dlete a Movie</h3>
					<div class="col-md-9 reviews-grids">
							<div class="review-info">

								<form action="./movie_delete.php" method="post">
									<p class="info">Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="dmovie_id" value="" /> 
									</p>
                                     
								<div class="rtm text-center">
									<input type="submit" value="Save Changed" class="btn"/>
								</div>
								</form>


							</div>
						<div class="clearfix"></div>
						</div>

					</div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    
            <div class="footer">
		
		<div class="copyright">
			<p>Copyright &copy; 2015.Company name All rights reserved. </p>
		</div>
	</div>
		</div>
        	
		</div> <!-- end main-->

	
	</div>
	
	<div class="clearfix"></div>
</body>
</html>
