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
    include 'navigationmenu.php';
    ?>
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
