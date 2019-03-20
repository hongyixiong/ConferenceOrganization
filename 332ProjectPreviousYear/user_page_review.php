<!DOCTYPE html>


<!--Start a session for review History -->
<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
if(isset($_SESSION['account']))
{
	$reviews= $dbh->query("select * from review where account_no = $account");

}
?>

<html>
<head>
<title>Reviews</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>

</head>
<body>
	<!-- header-section-starts -->
	<?php
	$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
	$result = $dbh->query("select * from movie");
	//$movie may have question
	//$movie = $result->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT));
	$movie = $result->fetch(PDO::FETCH_ASSOC);
	$movie_id = $movie["movie_id"];
	
	$_SESSION['movie'] = $movie_id;
	?>


	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="user_page_profile.php"><div class="hm"><i class="profile"></i><i class="profile1"></i></div></a></li>
					<li><a href="user_page_order.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a class="active" href="user_page_review.php"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>


		<div class="main">
        <div class="top-header span_top">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p>Personal Review</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>
				<div class="clearfix"></div>
        </div>
       
			
		<div class="reviews-section">
				<h3 class="head">Movie Reviews</h3>
				<div class="col-md-9 reviews-grids">
					


						<div class="review">

							
							<?php 
							while($movie){
								$movie_avg = $dbh->query("select round(avg(review_rating),2) AS avg_rating FROM Review where movie_id = $movie_id");
								$movie_cast = $dbh->query("select fname, lname from main_actor where movie_id = $movie_id");
								$movie_director = $dbh->query("select fname, lname from director where movie_id = $movie_id");
							?>
							<div class="review-info"><br><br>
								<a class="span"><?php echo $movie["title"];?></a>
								<p class="dirctr">Start date:&nbsp;&nbsp;&nbsp;<?php echo $movie["start_date"];?> &nbsp;&nbsp;&nbsp;&nbsp;End date:&nbsp;&nbsp;&nbsp;<?php echo $movie["end_date"];?></p>
								<div class="clearfix"></div>
								<p class="ratingview c-rating">Avg Readers' Rating:</p>
								<div class="rating c-rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div> 	
								<p class="ratingview c-rating">								
								&nbsp; 3.3/5</p>
								<div class="clearfix"></div>

								<p class="info"> REVIEW SCORE:&nbsp;&nbsp;&nbsp;
								<?php foreach($movie_avg as $avg) {
									if (empty($avg["avg_rating"])){
										echo "no rating";
									}else{
									echo $avg["avg_rating"]." /5 ";}}?></p>

								<p class="info">CAST:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php 
									foreach ($movie_cast as $cast){
									echo $cast["fname"]." ".$cast["lname"]."; ";}?></p>
								<p class="info">DIRECTION: &nbsp;&nbsp;&nbsp;&nbsp;
								<?php 
									$director= $movie_director->fetch(PDO::FETCH_ASSOC);
								echo $director["fname"]." ".$director["lname"]."; ";?></p>
								<p class="info">RATING:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $movie["rating"];?></p>
								<p class="info">DURATION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;<?php echo $movie["running_time"]."mins";?></p>
								<p class="info">SYNOPSIS:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $movie["plot_synopsis"];?></p>
								<div class="yrw">
									
									<div class="rtm text-center">
										<a href="user_page_review_single.php"> >> MORE REVIEWS</a><br>
									</div>

									<div class="clearfix"></div><br><br>

									
								</div>
							</div><?php 	$movie = $result->fetch(PDO::FETCH_ASSOC);
											$movie_id = $movie["movie_id"];}
											$movie_avg = $dbh->query("select round(avg(review_rating),2) AS avg_rating FROM Review where movie_id = $movie_id");
											$movie_cast = $dbh->query("select fname, lname from main_actor where movie_id = $movie_id");
											$movie_director = $dbh->query("select fname, lname from director where movie_id = $movie_id");?>
							<div class="clearfix"></div>
						</div>
                       
				</div>
                
		</div>


   	
   		
		<div class="clearfix"></div>
        <div class="footer">
			<div class="copyright">
				<p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
			</div>
		</div>	
    	</div>
    </div>
</body>
</html>