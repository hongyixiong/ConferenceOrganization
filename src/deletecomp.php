
	<?php
	    echo '<script>console.log("hi")</script>';
		include 'include\navigationmenu.php';
		$comid = $_GET['comid'];
		echo '<script>console.log("'.$comid.'")</script>';
		$update="DELETE from sponsor_companies WHERE id = '$comid';DELETE from sponsors WHERE sponsors_company_id = '$comid';DELETE from job_ads WHERE sponsors_company_id = '$comid';";

		$stmt =$pdo->query($update);
		header("location: delsponsorcomp.php");
		?>

    


