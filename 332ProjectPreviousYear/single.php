<!DOCTYPE html>
<?php
	session_start();
	$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

	$movie_single_id = $_SESSION['movie'];

	$movie_title_result = $dbh->query("select title from movie where movie_id = $movie_single_id");
	$movie_single_title = $movie_title_result->fetch(PDO::FETCH_ASSOC);
	
	//start date
	$movie_start_result = $dbh->query("select start_date from movie where movie_id = $movie_single_id");
	$start_date = $movie_start_result->fetch(PDO::FETCH_ASSOC);

	//end date
	$movie_end_result = $dbh->query("select end_date from movie where movie_id = $movie_single_id");
	$end_date = $movie_end_result->fetch(PDO::FETCH_ASSOC);
	
	//Synopsis
	$movie_synopsis_result = $dbh->query("select plot_synopsis from movie where movie_id = $movie_single_id");
	$synopsis = $movie_synopsis_result->fetch(PDO::FETCH_ASSOC);

	//Average score////////////////////////////
	$movie_avg_result = $dbh->query("select round(avg(review_rating),2) AS avg_rating FROM Review where movie_id = $movie_single_id") or die("die");
	$movie_avg = $movie_avg_result->fetch(PDO::FETCH_ASSOC);


	//count commands
	$movie_command_count = $dbh->query("select count(review_content) as command_number FROM review where movie_id = $movie_single_id");
	$coummand_count = $movie_command_count->fetch(PDO::FETCH_ASSOC);


	// show each review one by one//
	$review_result = $dbh->query("select * from review where movie_id = $movie_single_id");
	$review_line = $review_result->fetch(PDO::FETCH_ASSOC);

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
	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="index.html"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
					<li><a class="active" href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					
				</ul>
			</div>
		<div class="main">
		<div class="single-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="Login">
					<a href = "login_customer.html">Login As Customer</a><br>
                    <a href = "login_admi.html">Login As Administrator</a>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
				<h3 class="head">Movie Reviews</h3>
					<div class="col-md-9 reviews-grids">

						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="images/r4.jpg" alt="" /></a>
							</div>
							<div class="review-info">
								<a class="span"><?php echo $movie_single_title['title'];?></a>
								<p class="dirctr">Start date:&nbsp;&nbsp;&nbsp;<?php echo $start_date["start_date"];?> &nbsp;&nbsp;&nbsp;&nbsp;End date:&nbsp;&nbsp;&nbsp;<?php echo $end_date["end_date"];?></p>		

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

								<p class="info"> REVIEW SCORE:&nbsp;&nbsp;
								<?php echo $movie_avg["avg_rating"]." /5";?></p>

								<p>SYNOPSIS:&nbsp;&nbsp;<?php echo $synopsis["plot_synopsis"];?></p>



							</div>
							<div class="clearfix"></div>
						

						</div>
							<!-- comments-section-starts -->
	    <div class="comments-section">
	        <div class="comments-section-head">
				<div class="comments-section-head-text">
					<h3><?php echo $coummand_count["command_number"];?> &nbsp;Comments</h3>
				</div>
				<div class="clearfix"></div>
		    </div>
			<div class="comments-section-grids">
				<div class="comments-section-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/eye-brow.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">User No. <?php echo $review_line["account_no"];?></a></h4>
						<label>  <?php echo $review_line["review_time"];?> &nbsp;&nbsp;&nbsp;&nbsp;RATE:&nbsp; <?php echo $review_line["review_rating"]."/5";?></label>
						
						<p><?php echo $review_line["review_content"];?></p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="yrw">
						<?php
						$review_line = $review_result->fetch(PDO::FETCH_ASSOC);
						?>
					</div>
					<div class="clearfix"></div>
				</div>



				<div class="comments-section-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/stylish.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">User No. <?php echo $review_line["account_no"];?></a></h4>
						<label>  <?php echo $review_line["review_time"];?> &nbsp;&nbsp;&nbsp;&nbsp;RATE:&nbsp; <?php echo $review_line["review_rating"]."/5";?></label>
						
						<p><?php echo $review_line["review_content"];?></p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="yrw">
						<?php
						$review_line = $review_result->fetch(PDO::FETCH_ASSOC);
						?>
					</div>
							
					<div class="clearfix"></div>
				</div>
			</div>
	    </div>
	  <!-- comments-section-ends -->
		  <div class="reply-section">
			  <div class="reply-section-head">
				  <div class="reply-section-head-text">
					  <h3>Make a Review</h3>
				  </div>
			  </div> 
			<div class="blog-form">
			    <form>
					<textarea></textarea>
					<a href = "login_customer.html"><input type="button" value="SUBMIT COMMENT"></a>
			    </form>
			 </div>
		  </div>
		  </div>
					<div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Featured Today in Movie Reviews</h3>
							<ul>
								<li>
									<a href="single.html"><img src="images/f1.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="images/f2.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="images/f3.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="images/f4.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="images/f5.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="images/f6.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
						
						
						<div class="might">
				<h4>You might also like</h4>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="images/mi.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="images/mi1.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="images/mi2.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="images/mi3.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
			</div>
			<!---->
				
				<!---->

					</div>

					<div class="clearfix"></div>
			</div>
			</div>
		
	<div class="footer">
			<div class="copyright">
				<p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
			</div>
		</div>	
	</div>
	<div class="clearfix"></div>
	</div>
</body>
</html>