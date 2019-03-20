<!DOCTYPE html>
<?php
session_start();
$account = $_SESSION['account'];
$movie_id = $_SESSION['movie'];
$showtime = $_POST['showtime'];
$ticket = $_POST['ticket_num'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$tickets_num = $dbh->query("SELECT * FROM daily_showing WHERE left_seat >= '$ticket' and show_time = '$showtime' and movie_id = '$movie_id'") or die("die");
if(($tickets_num->rowCount())!=0) {
	$time = date('Y-m-d');
	if (strtotime($time)<strtotime($showtime)){
	$tmp = $tickets_num->fetch(PDO::FETCH_ASSOC);
	$theatre_no = $tmp['theatre_no'];
	$sql = "INSERT INTO reservation (account_no,movie_id,theatre_no,ticket_num,show_time,state) VALUES ('$account','$movie_id','$theatre_no','$ticket','$showtime','approved')";
	$dbh->query($sql) or die("fail");
	$tickets = $tmp['left_seat']-$ticket;

	$sales = $tmp['sale']+ $ticket;

	$dbh->query("update Theatre set profit = profit+10*$ticket where theatre_no = '$theatre_no'") or die("profit fail");



	$dbh->query("update daily_showing set left_seat=$tickets, sale=$sales  where show_time = '$showtime'") or die("diediedie");



	$feedback = "book successfully";
	$url = "http://localhost/332Project/user_page_order.php";
	} else {
		$feedback = "late";
		$url = "http://localhost/332Project/user_page_order.php";
	}
} else {
	$feedback = "sorry, we do not have enough tickets";
	$url = "http://localhost/332Project/user_page_order.php";
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
<meta http-equiv="refresh" content="1;url=<?php echo $url; ?>"> 
</head>

<body>
<p style ="font-size: 40px;"> <?php echo $feedback; ?></p>
</body>
</html>