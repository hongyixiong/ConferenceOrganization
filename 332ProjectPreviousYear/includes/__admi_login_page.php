<!DOCTYPE html>
<?php
$givenaccount = $_POST["admin_login_account"];
$givenpassword = $_POST["admin_login_password"];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$result = $dbh->query("select account_no from customer where account_no = $givenaccount AND password = $givenpassword");
if (empty($result)) {
	$feedback = "password or account incorrect, back to login page in 4 seconds";
	$url = "http://localhost/332Project/login_customer.html";
} else {
	$feedback = "Welcome";
	$url = "http://localhost/332Project/user_page.html";
}
?>

<html>
	<head>
		<title>Home</title>
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
		<meta http-equiv="refresh" content="1;url=<?php echo $url; ?>"> 
	</head>

	<body>
		<p style ="font-size: 40px;"> <?php echo $feedback ?></p>
	</body>
</html>