<?php
session_start();
$account = $_SESSION['account'];
$member_account = $_POST['account_id'];
$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$sql1="delete from reservation where account_no = '$member_account'";
$sql2="delete from rental where account_no = '$member_account'";
$sql3="delete from review where account_no='$member_account'";
$sql4="delete from customer_phone where account_no='$member_account'";

$sql="delete from customer where account_no = '$member_account'";
$dbh->query($sql1) or die("delete fail");
$dbh->query($sql2) or die("delete fail");
$dbh->query($sql3) or die("delete fail");
$dbh->query($sql4) or die("delete fail");
$dbh->query($sql) or die("delete fail");
header("Location: http://localhost/332Project/admin_member.php");
?>