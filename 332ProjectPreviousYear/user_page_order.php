<!DOCTYPE html>
<?php
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
?>
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
					<a><img src="images/logo.png" alt="" /></a>
					<p>Personal Order</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>
				<div class="clearfix"></div>
			</div>



		<div class="reviews-section">
				<h3 class="head">Browse  Movies</h3><br>
                
             
                <form action="browse.php" method="post" class="agile_form">
                <h2 class="w3layouts">Search Movie Showing Time</h2><br>
                    <div class="clear"></div>	
                       
                    <div class="dropdown-button">
						<select class="dropdown"  data-settings='{"wrapperClass":"flat"}' name="movie_title">
						<option value="0">Choose the Movie</option>	
						<?php
						$movie_title=$dbh->query("select title from movie")	;
						foreach($movie_title as $row){
							echo "<option>".$row['title']."</option>";
						}
						?>
						</select>
					</div>
                    <div class="submit">
                        <input type="submit" value="search">
                    </div>  
                </form>	
                	
            
					<div class="col-md-9 reviews-grids">
						
					
			</div>
					</div>
		<div class="clearfix"></div><br><br>




            
			<div class="reviews-section">
				<h3 class="head">Personal Order</h3><br>
                
               
                <form action="movieorder.php" method="post" class="agile_form">
                <h2 class="w3layouts">Search your movie</h2><br>
                    <div class="clear"></div>
            
                    <div class="dropdown-button">  
										<select class="dropdown" data-settings='{"wrapperClass":"flat"}' name="cineplex_num">
										<option value="0">Choose the Cineplex</option>	
										<option>1</option>
										<option>2</option>
										<option>3</option>
									  </select>
					</div>	
                       
                    <div class="dropdown-button">
						<select class="dropdown"  data-settings='{"wrapperClass":"flat"}' name="movie_title">
						<option value="0">Choose the Movie</option>	
						<?php
						$movie_title=$dbh->query("select title from movie where 1")	;
						foreach($movie_title as $row){
							echo "<option>".$row['title']."</option>";
						}
						?>
						</select>
					</div>
                    <div class="submit">
                        <input type="submit" value="submit">
                    </div>  
                </form>	
                
            
					<div class="col-md-9 reviews-grids">
						
					
			</div>
					</div>
		<div class="clearfix"></div><br><br>

            








                <div class="reviews-section">
                <h3 class ="head">Booking History</h3><br>
                    <table>
						<tr><th>theatre_no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>movie_id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>ticket_num&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>show_time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>book_time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>state</th></tr>
						<?php

							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

							$rows = $dbh->query("select * from reservation where account_no = $account");
							
							foreach($rows as $row) {
								$show_time = $row["show_time"];
                                $movie_num = $row['movie_id'];
								$movie_name = $dbh->query("select title from movie where movie_id='$movie_num'")
								or die("select fail");
								$movie_id = $movie_name->fetch(PDO::FETCH_ASSOC);
                                
								echo 
								"<tr><td>".$row["theatre_no"]."</td><td>".$movie_id['title']."</td><td >".$row["ticket_num"]."</td><td>".$row["show_time"].
								"</td><td>".$row["time"]."</td><td>".$row["state"]."</td></tr>";
								
							}

						?>
						</table>
				
                </div>
				<div class="reviews-section">
				<h3 class="head">Cancel Reservation</h3><br>
                
               
                <form action="cancel.php" method="post" class="agile_form">
                <h2 class="w3layouts ">Search your reservation</h2><br>
                    <div class="clear"></div>	
                     
						<div class="form-input">  
						<input type="text" name="theatre_no" placeholder="Enter the Theatre_no"/> 
						</div>	<br>
                       
                    <div class="form-input">  
						<input type="text" name="show_time" placeholder="Enter the showing time"/> 
					</div>	<br>
					<div class="form-input">  
						<input type="text" name="booking_time" placeholder="Enter the booking time"/> 
					</div>	<br>
                    <div class="submit">
                        <input type="submit" value="submit">
                    </div>  
                </form>	
                
				</div>
                <div class="reviews-section">
                <h3 class ="head">Rental History</h3><br>
                    <table>
						<tr><th>account_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>movie_id&nbsp;&nbsp;</th></tr>
						<?php

							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

							$rows = $dbh->query("select * from rental where account_no = $account");
							foreach($rows as $row) {
								
								echo 
								"<tr><td>".$row["account_no"]."</td><td >".$row["time"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row["movie_id"]."</td></tr>";
								
							}

						?>
						</table>
                </div>
		
				
        <div class="footer">
    
		<div class="copyright">
			<p>Copyright &copy; CISC332 PROJECT GROUP88. </p>
		</div>
	</div>	
        </div>
        </div>
	<div class="clearfix"></div>
</body>
</html>