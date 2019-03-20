<!DOCTYPE html>

<?php
$newaccount = $_POST["customer_sign_account"];
$newpassword = $_POST["customer_sign_password"];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

$sql = "INSERT INTO customer (account_no, password,complex_no,isAdmin) VALUES ('$newaccount','$newpassword',1,0)";

if($dbh->query($sql) == TRUE) { 
    $feedback = "New account created, Please login now ";
    $url = "http://localhost/332Project/login_customer.html";
} else {
    $feedback = "password or account invalid, back to sign up page in 3 seconds";
    $url = "http://localhost/332Project/login_customer.html";
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

<!--webfont-->
<meta http-equiv="refresh" content="3;url=<?php echo $url; ?>"> 
</head>

<body>
<p style ="font-size: 40px;"> <?php echo $feedback; ?></p>
</body>
</html>