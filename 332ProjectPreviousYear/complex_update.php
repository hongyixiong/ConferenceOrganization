<?php
$complex_no = $_POST["ucomplex_no"];
$theater_no = $_POST["utheatre_no"];

$complex_name = $_POST["ucomplex_name"];
$address= $_POST["uaddress"];
$phone_no = $_POST["uphone_no"];


$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");

$result = $dbh->query("select * from theatre_complexes where complex_no = '$complex_no'");

if (($result->rowCount())!=0){                                
$update="UPDATE theatre_complexes SET theatre_num = '$theater_no', name = '$complex_name', address = '$address', phone_no = '$phone_no' where complex_no='$complex_no' ";
}
 else{
 $update = "INSERT theatre_complexes SET theatre_num = '$theater_no', name = '$complex_name', address = '$address', phone_no = '$phone_no',complex_no='$complex_no'";
 }   

$dbh->query($update) or die("fail");



header("Location: admin_theatre.php");  
?>