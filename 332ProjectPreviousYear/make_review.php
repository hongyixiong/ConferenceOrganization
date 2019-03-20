<!DOCTYPE html>

<?php
session_start();
$thisaccount = $_SESSION['account'];
$movie = $_SESSION['movie'];
$newreview = $_POST["customer_review"];
$newrating = $_POST["customer_rating"];
//$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
$conn=mysqli_connect("localhost","root","","theatre_complexes_db");


$sql = "INSERT INTO review (account_no, movie_id,review_rating,review_content) VALUES ('$thisaccount','$movie','$newrating','$newreview')";

$conn->query($sql);
echo $conn->error;


//echo $dbh->error;
header("Location: user_page_review_single.php");

?>

