<?php

$theatre_no = $_POST["xtheatre_no"];
$seat_no = $_POST["xseats_no"];
$screen_size= $_POST["xscreen_size"];
$first =  substr( $theatre_no, 0, 1 );


$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

$result = $dbh->query("select * from theatre where theatre_no = '$theatre_no'");

if (($result->rowCount())!=0){ 
$update="UPDATE Theatre SET  max_num_seats = '$seat_no', screen_size = '$screen_size' where theatre_no = '$theatre_no' ";
}
else{
$update = "INSERT  Theatre SET  max_num_seats = '$seat_no', screen_size = '$screen_size',theatre_no = '$theatre_no',complex_id ='$first' ";
}
    

$dbh->query($update) or die("fail");



header("Location: admin_theatre.php");  
?>