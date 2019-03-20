<!DOCTYPE html>
<?php
$movie_title = $_POST['movie_title'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$tmpmovie= $dbh->query("select * from movie where title = '$movie_title'");

$movie = $tmpmovie->fetch(PDO::FETCH_ASSOC);
$movie_id = $movie['movie_id'];
$sql = "select * from daily_showing where movie_id = '$movie_id'";
$showtime = $dbh->query($sql) or die("die");
//$show_time = $showtime->fetch(PDO::FETCH_ASSOC);
$complex = $dbh->query("select daily_showing.movie_id, theatre.complex_id , daily_showing.show_time from theatre join daily_showing on daily_showing.theatre_no = theatre.theatre_no and daily_showing.movie_id = '$movie_id'");
//$complex_num = $complex_no->fetch(PDO::FETCH_ASSOC);
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
				
            
					<div class="col-md-9 reviews-grids" >
						
							
								
								<p><font size = 8>
								<?php echo $movie_title;?><br>
								</font></p>
								<div class="clearfix"></div>


								<table>
								<tr><th>complex number</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;showing time</th></tr><br>
								<?php
									foreach($complex as $row)
									{
										echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["complex_id"]."</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["show_time"]."</td></tr>";
									}?>
								</table>
								<div class="clearfix"></div>

						

						
					</div>
			</div>
		</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="footer">
                    <div class="copyright">
					<p>Copyright &copy; 2015.Company name All rights reserved. </p>
            		</div>	
		</div>
			
		</div>
		

		<div class="clearfix"></div>

	<div class="clearfix"></div>
	</div>
</body>
</html>