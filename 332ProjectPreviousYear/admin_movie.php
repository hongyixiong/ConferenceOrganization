<!DOCTYPE html>
<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
?>
<html>
<head>
<title>Admin Movie</title>
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
                   <li><a href="admin_member.php"><div class="hm"><i class="member"></i><i class="member1"></i></div></a></li>
					<li><a class = "active"  href="admin_Movie.php"><div class="cat"><i class="movie"></i><i class="movie1"></i></div></a></li>
					<li><a href="admin_theatre.php"><div class="bk"><i class="theatre"></i></i><i class="theatre1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">

		<div class="user_page_header">
			<div class="top-header">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p> Manage Movies</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>

				<div class="clearfix"></div>
			</div>



            <div class="reviews-section">
                <h3 class ="head">All Movies</h3><br>
                    <table>
						<tr><th>moive id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>running time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>plot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>start date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>end date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>sales</th></tr>
						<?php
							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

							$rows = $dbh->query("select * from movie");
							foreach($rows as $row) {
								$movie_id = $row["movie_id"];
    							$movie_sale = $dbh->query("SELECT SUM(sale) as sale FROM Daily_showing WHERE movie_id = '$movie_id'");
    							
    							$ms = $movie_sale->fetch(PDO::FETCH_ASSOC);
								echo 
								"<tr><td>".$row["movie_id"]."</td><td>".$row["title"]."</td><td >".$row["running_time"]."</td><td>".$row["rating"]."</td><td>".$row["plot_synopsis"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$ms["sale"]."</td></tr>";			
							}
						?>
					</table><br>
					<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
                <h3 class ="head">The Most Popular Movie</h3><br>







                 <table>
						<tr><th>moive id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>running time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>plot&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>start date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>end date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>sales</th></tr>
                	<?php
						$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
						$sql_popular = "select sum(sale) as sale_sum, movie_id from Daily_showing group by movie_id order by sale_sum DESC";
						$max_sale = $dbh->query($sql_popular);
						$ms = $max_sale->fetch(PDO::FETCH_ASSOC);
						$popular_movie = $ms['movie_id'];

						$sql_m = $dbh->query("select * from movie where movie_id = $popular_movie");
						$sql_movie = $sql_m->fetch(PDO::FETCH_ASSOC);
			

						echo
						"<tr><td>".$sql_movie["movie_id"]."</td><td>".$sql_movie["title"]."</td><td >".$sql_movie["running_time"]."</td><td>".$sql_movie["rating"]."</td><td>".$sql_movie["plot_synopsis"]."</td><td>".$sql_movie["start_date"]."</td><td>".$sql_movie["end_date"]."</td><td>".$ms["sale_sum"]."</td></tr>";	
		
					?>

			    </table><br>

                <div class="clearfix"></div>

			</div>


			<div class="reviews-section">
				<h3 class="head">Add a New Movie</h3>
					<div class="col-md-9 reviews-grids">
							<div class="review-info">

								<form action="./movie_insert.php" method="post">
									<p class="info">Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="movie_id" value="" /> 
									</p>
                                     <p class="info">Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="complex_no" value="" /> 
									</p>
                                    <p class="info">Theater No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" name="theater_no" value="" /> 
									</p>
                                    <p class="info">Left seat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="left_seat" value="" /> 
									</p>
                                    <p class="info">Show time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="show_time" value="" /> 
									</p>
									<p class="info">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="movie_title" value="" />
									</p>
									<p class="info">Running Time:&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="duration" value="" /> 
									</p>
								<p class="info">Plot:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="plot" value="" />
										</p>
								<p class="info">Rating:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="rating" value="" /> 
								</p>
								<p class="info">Start date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="start_date" /> 
								</p>
								<p class="info">End date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
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
				<h3 class="head">Update the Movie</h3>
					<div class="col-md-9 reviews-grids">
							<div class="review-info">

								<form action="./movie_update.php" method="post">
									<p class="info">Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="nmovie_id" value="" /> 
									</p>
                                    <p class="info">Previous Complex No:&nbsp;&nbsp;&nbsp;
										<input type="text" name="npcomplex_no" value="" /> 
									</p>
                                    <p class="info">New Complex No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="ncomplex_no" value="" /> 
									</p>
                                    <p class="info">Previous Theater No:&nbsp;&nbsp;&nbsp;
										<input type="text" name="nptheater_no" value="" /> 
									</p>
                                    <p class="info">New Theater No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="ntheater_no" value="" /> 
									</p>
                                    <p class="info">Previous Show time:&nbsp;&nbsp;&nbsp;&ensp;
										<input type="text" name="npshow_time" value="" /> 
									</p>
                                    <p class="info">New Show time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
				<h3 class="head">Delete a Movie</h3>
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
                    <br><br><br><br>
                    




                <div class="footer">
		
            <div class="copyright">
                <p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
            </div>
            </div>	
			</div>		

					
		</div>
		
		</div> <!-- end main-->

	
	</div>
	
	<div class="clearfix"></div>
</body>
</html>




