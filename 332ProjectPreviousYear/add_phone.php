<?php
session_start();
$account = $_SESSION['account'];
$phone = $_POST["new_phone_number"];

$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");


$update="insert into customer value ('$account', '$phone');

$dbh->query($update);

header("Location: user_page_profile.php"); 