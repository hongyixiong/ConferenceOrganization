<!DOCTYPE html>
<?php
$theatre_no = $_POST['theatre_no'];
$show_time = $_POST['show_time'];
$booking_time = $_POST['booking_time'];
session_start();
$account = $_SESSION['account'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$reservation = $dbh->query("select * from reservation where account_no = '$account' and theatre_no = '$theatre_no' and show_time = '$show_time' and time = '$booking_time'") or die("select fail");
$seat = ($reservation->fetch(PDO::FETCH_ASSOC))['ticket_num'];
$dbh->query("update Theatre set profit = profit - 10*'$seat' where theatre_no = '$theatre_no'");
$cancel = "UPDATE reservation SET state = 'canceled' WHERE account_no = '$account' and theatre_no = '$theatre_no' and time = '$booking_time'";
$dbh->query($cancel) or die("update fail");
$update = "UPDATE daily_showing SET left_seat=left_seat+$seat, sale=sale-$seat WHERE show_time = '$show_time'and theatre_no = '$theatre_no'";
$dbh->query($update) or die("update daily_showing fail");
header("Location: http://localhost/332Project/user_page_order.php"); 
?>
