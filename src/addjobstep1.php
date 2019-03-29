<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Functions</title>
	<meta charset="utf-8" />
	<meta name="author" content="Group 99"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Josefin+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">	
	<link rel="stylesheet" href="css/responsive.css">	
</head>

<body>
<header>
	<!--Should be included in all .php and .html files-->
	<a href="index.php">
		<img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
	</a>
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

	<div id="main-content">

		<h1 id="page-title">Add job</h1>

		<?php

		$comid = $_POST['comid'];
		$title = $_POST['title'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$pay = $_POST['pay'];

		if(!is_numeric($pay)){
			echo "<span style=\"color:red\">Invalid pay rate, must be a number.</span>";
			echo '<Button value = "back" onclick="history.back()">Back</Button>';
		}else{


		$sql = "INSERT INTO job_ads (sponsor_company_id, job_title, city, province, pay_rate) VALUES (?,?,?,?,?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$comid,$title,$city,$province,$pay]);

		header("location: displayalljobs.php");

		}

		?>
        

	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
