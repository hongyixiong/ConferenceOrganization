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
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li class="dropdown">
				<a href="subcommittees.php">Sub-Committees</a>
				<div class="dropdown-content">
					<?php
                        $pdo = new PDO('mysql:host=localhost:3307;dbname=conferenceorganization', "root", "");
                        $sql = "select name from sub_committees";
                        $stmt = $pdo->query($sql);

					while ($item = $stmt->fetch()) {
					echo "<a href='subcommitteedetails.php?name=". $item["name"] ."'>". $item['name'] ."</a>";
					}
					?>
				</div>
			</li>
			<li><a href="schedule.php">Schedule</a></li>
			<li><a href="sponsors.php">Sponsors</a></li>
			<li><a href="attendees.php">Attendees</a></li>
			<li><a href="hotelrooms.php">Hotel Rooms</a></li>
			<li><a href="functions.php">Functions</a></li>
		</ul>
	</nav>
</header>

	<div id="main-content">

		<h1 id="page-title">Choose Functions</h1>

        <div class="list-nav">
            <ul>
                <li><a href="addattendee.php">Add Attendee</a> </li>
                <li><a href="addsponsorcomp.php">Add Sponsorship Company</a> </li>
                <li><a href="delsponsorcomp.php">Delete Sponsorship Company</a> </li>
                <li><a href="totalintake.php">Show Total Intake of The Conference</a> </li>
                <li><a href="switchsession.php">Switch Session</a> </li>
            </ul>
        </div>

	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
