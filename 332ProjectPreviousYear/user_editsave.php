<?php
session_start();
$account = $_SESSION['account'];
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$address = $_POST["address"];
$e_mail = $_POST["e_mail"];
$password = $_POST["password"];
$creditcard_no = $_POST["creditcard_no"];
$creditcard_expiry_date = $_POST["creditcard_expiry_date"];
$phone = $_POST["phone_number"];

$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");


$update="UPDATE customer SET fname = '$first_name',lname='$last_name',address='$address',e_mail='$e_mail',password='$password',creditcard_no='$creditcard_no', creditcard_expiry_date = '$creditcard_expiry_date' WHERE account_no = $account; UPDATE Customer_Phone Set phone_no = '$phone' WHERE account_no = '$account'";


$dbh->query($update);
header("Location: user_page_profile.php");  
?>