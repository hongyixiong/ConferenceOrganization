<!DOCTYPE html>

<html>
<head>
<title>Admin Member</title>
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
					<li><a class = "active" href="admin_member.php"><div class="hm"><i class="member"></i><i class="member1"></i></div></a></li>
					<li><a  href="admin_Movie.php"><div class="cat"><i class="movie"></i><i class="movie1"></i></div></a></li>
					<li><a href="admin_theatre.php"><div class="bk"><i class="theatre"></i></i><i class="theatre1"></i></div></a></li>
				</ul>
			</div>

		<div class="main">
		<div class="review-content">
			<div class="top-header span_top">
				<div class="logo">
					<a><img src="images/logo.png" alt="" /></a>
					<p>Manage Members</p>
				</div>
				<div class="Login">
					<a href = "logout.php">Logout at here</a>
				</div>
				
				<div class="clearfix"></div>
			</div>


            <div class="reviews-section">
                <h3 class ="head">All Members</h3><br>
                    <table>
						<tr><th>account_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>complex_no&nbsp;&nbsp;&nbsp;&nbsp;</th><th>last name&nbsp;&nbsp;&nbsp;&nbsp;</th><th>first name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>email</th></tr>
						<?php
							$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

							$rows = $dbh->query("select * from customer where isAdmin = 0");
							foreach($rows as $row) {
    
								echo 
								"<tr><td>".$row["account_no"]."</td><td>".$row["complex_no"]."</td><td >".$row["lname"]."</td><td>".$row["fname"].
								"</td><td>".$row["address"]."</td><td>".$row["e_mail"]."</td></tr>";			
							}



						?>
						</table>
						

                </div>


			<div class="reviews-section">
				<h3 class="head">Delete a Member</h3><br>
                
                
                <form action="./includes/delete.php" method="post" class="agile_form">
                <h2 class="w3layouts">Find the member you what to delete</h2><br>
                    <div class="clear"></div>
            
                    <div class="dropdown-button">  
										<select class="dropdown" data-settings='{"wrapperClass":"flat"}' name="account_id">
										<option>Choose the member id</option>	
										<?php 
										$sql = "select * from customer where isAdmin = 0";
										$members = $dbh->query($sql)or die("no user");
										foreach($members as $member)
										{
											echo "<option>".$member['account_no']."</option>";
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
				<h3 class="head">Show Member Purchase History</h3><br>
                
                
                <form action="get_reservation.php" method="post" class="agile_form">
                <h2 class="w3layouts ">Search a Member</h2><br>
                    <div class="clear"></div>
                       
                    <div class="dropdown-button">
						<select class="dropdown"  data-settings='{"wrapperClass":"flat"}' name="account_num">
						<option value="0">Choose a Member</option>	
						<?php
						$members=$dbh->query("select account_no from customer where isAdmin = 0")	;
						foreach($members as $member){
							echo "<option>".$member['account_no']."</option>";
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