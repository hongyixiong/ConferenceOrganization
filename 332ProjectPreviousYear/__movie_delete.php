<?php

$movie_id = $_POST["dmovie_id"];



$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");


$update="DELETE from BelongTo WHERE movie_id = '$movie_id';DELETE from Daily_Showing WHERE movie_id = '$movie_id';DELETE from Movie WHERE movie_id = '$movie_id';";

$dbh->query($update);



header("Location: admin_movie.php");  
?>



