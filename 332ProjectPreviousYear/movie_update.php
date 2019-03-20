<?php
$movie_id = $_POST["nmovie_id"];
$pcomplex_no = $_POST["npcomplex_no"];
$complex_no = $_POST["ncomplex_no"];
$ptheater_no = $_POST["nptheater_no"];
$theater_no = $_POST["ntheater_no"];
$pshow_time = $_POST["npshow_time"];
$show_time = $_POST["nshow_time"];
$left_seat = $_POST["nleft_seat"];

$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

if ($pshow_time ==""or $ptheater_no ==""or $complex_no ==""){$update = "Insert Daily_Showing SET show_time = '$show_time', movie_id='$movie_id', theatre_no = '$theater_no',left_seat = '$left_seat';Insert BelongTo SET movie_id = '$movie_id',complex_no = '$complex_no'";}
                                
else{$update="UPDATE Daily_Showing SET show_time = '$show_time', theatre_no='$theater_no',left_seat = '$left_seat' where show_time = '$pshow_time' AND movie_id = '$movie_id' AND theatre_no = '$ptheater_no';UPDATE BelongTo SET complex_no = '$complex_no' where complex_no = '$pcomplex_no' AND movie_id = '$movie_id'";}

    

$dbh->query($update) or die("fail");



header("Location: admin_movie.php");  
?>