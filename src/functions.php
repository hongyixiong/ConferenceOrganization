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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

	<div id="main-content">

		<h1 id="page-title">More Functions</h1>

        <div class="list-nav">
            <ul>
                <li><a href="addattendeestep1.php">Add an attendee</a> </li>
                <li><a href="addsponsorcomp.php">Add a sponsorship company</a> </li>
                <li><a href="delsponsorcomp.php">Delete a sponsorship company</a> </li>
                <li><a href="totalintake.php">Show the intakes of the conference</a> </li>
                <li><a href="addjob.php">Add job to a company</a> </li>
            </ul>
        </div>

	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
