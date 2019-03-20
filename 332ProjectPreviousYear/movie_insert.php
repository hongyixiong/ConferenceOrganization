<?php

$movie_id = $_POST["movie_id"];
$movie_title = $_POST["movie_title"];
$duration = $_POST["duration"];
$plot = $_POST["plot"];
$rating = $_POST["rating"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$complex_no = $_POST["complex_no"];
$theater_no = $_POST["theater_no"];
$show_time = $_POST["show_time"];
$left_seat = $_Post["left_seat"];


$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");


$update="Insert movie SET movie_id = '$movie_id',title='$movie_title',running_time='$duration',Rating='$rating',plot_synopsis='$plot', start_date='$start_date', end_date='$end_date';
Insert Daily_Showing SET show_time = '$show_time', left_seat = '$left_seat', movie_id='$movie_id', theatre_no = '$theater_no';
Insert BelongTo SET movie_id = '$movie_id',complex_no = '$complex_no';";

$dbh->query($update);



header("Location: admin_movie.php");  
?>