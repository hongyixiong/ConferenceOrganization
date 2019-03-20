<!DOCTYPE html>
<?php
	session_start();
	$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

	$movie_single_id = $_SESSION['movie'];

	$movie_title_result = $dbh->query("select title from movie where movie_id = $movie_single_id")or die("die");
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
	$movie_avg_result = $dbh->query("select round(avg(review_rating),1) AS avg_rating FROM Review where movie_id = $movie_single_id") or die("die");
	$movie_avg = $movie_avg_result->fetch(PDO::FETCH_ASSOC);

	//count commands
	$movie_command_count = $dbh->query("select count(review_content) as command_number FROM review where movie_id = $movie_single_id");
	$coummand_count = $movie_command_count->fetch(PDO::FETCH_ASSOC);

	//command's user
	
	


	// each user make a review
	$account_single = $_SESSION['account'];

?>






<html>
<head>
<title><?php echo $movie_single_title['title'];?></title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
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
					<li><a href="user_page_profile.php"><div class="hm"><i class="profile"></i><i class="profile1"></i></div></a></li>
					<li><a href="user_page_order.php"><div class="cat"><i class="order"></i><i class="order1"></i></div></a></li>
					<li><a class="active" href="user_page_review.php"><div class="bk"><i class="review"></i><i class="review1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">
		<div class="single-content">
			<div class="top-header span_top">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p>Movie Review</p>
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
								<?php echo $movie_avg["avg_rating"]." /5 ";?></p>

								<p class="info">SYNOPSIS:&nbsp;&nbsp;<?php echo $synopsis["plot_synopsis"];?></p>



							</div>
							<div class="clearfix"></div>
						

						</div>
							<!-- comments-section-starts -->
	    <div class="comments-section">
	        <div class="comments-section-head">
          
					  
				 
				<div class="comments-section-head-text"><br><br>
					<h3><?php echo $coummand_count["command_number"];?> &nbsp;Comments</h3>
				</div>
				<div class="clearfix"></div>
		    </div>
			<div class="comments-section-grids">
				

					<?php
					$command_user_sql = "select * from review where movie_id = $movie_single_id";
					$command_users = $dbh->query($command_user_sql) or die("command die");
					$command_user = $command_users->fetch(PDO::FETCH_ASSOC);
					while($command_user)
					{
						$command_user_id = $command_user['account_no'];
						$command_time = $command_user['review_time'];
						$command_rating = $command_user['review_rating'];
						$command = $command_user['review_content'];
					?>
					<div class="col-md-10 comments-section-grid-text">
						<div class="col-md-2 comments-section-grid-image">
							<img src="images/eye-brow.jpg" class="img-responsive" alt="" />
					    </div>
						<h4><a href="#">User No. <?php echo $command_user_id;?></a></h4>
						<label>  <?php echo $command_time;?> &nbsp;&nbsp;&nbsp;&nbsp;RATE:&nbsp; <?php echo $command_rating."/5";?></label>
						
						<p><?php echo $command;?></p><br><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="#">Reply</a></span><br>
						<i class="rply-arrow"></i>
					</div>
					<div class="yrw">
						
					</div><br><?php
						$command_user = $command_users->fetch(PDO::FETCH_ASSOC);}
                        
						?>
                    
					<div class="clearfix"></div><br>
                    <div class="comments-section-head-text"><br><br>
                    <h3>Make a Review</h3>
                    </div>
				</div>



				
			</div>
	    </div>
	  <!-- comments-section-ends -->
		  <div class="reply-section">
			  <div class="reply-section-head">
				  
			  </div> 
			<div class="blog-form">
			    <form action = "./make_review.php" method = "post">

					<textarea name="customer_review" placeholder="Enter the movie review"> </textarea>
					<div class="dropdown-button">      			
						<select class="dropdown" tabindex="6" data-settings='{"wrapperClass":"flat"}'
						name="customer_rating">
						<option>Please rate the movie</option>	
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						</select>
					</div></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="SUBMIT COMMENT" class="btn">
			    </form>
			 </div>
		  </div>
		  </div>
					
				
				<div class="clearfix"></div>
				</div>
                <div class="footer">
		
                    <div class="copyright">
                        <p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
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