<!DOCTYPE html>
<html lang="en">

<head>
	<title>Conference Organizing System | Sub-Committee</title>
	<meta charset="utf-8" />
	<meta name="author" content="Group 99"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Josefin+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">	
	<link rel="stylesheet" href="css/responsive.css">	
</head>

<body>
	<header>
		<a href="index.html">
			<img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
		</a>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="dropdown">
					<a href="subcommittee.php">Sub-Committee</a>
					<div class="dropdown-content">
                        <?php
                        $pdo = new PDO('mysql:host=localhost:3307;dbname=conferenceorganization', "root", "");
                        $sql = "select name from sub_committees";
                        $stmt = $pdo->query($sql);

                        while ($item = $stmt->fetch()) {
                            echo "<a href=\"./subcommittee.php\">". $item["name"] ."</a>";
                        }
                        ?>
					</div>

				</li>
				<li><a href="./schedule.html">Schedule</a></li>
				<li><a href="sponsor.php">Sponsor</a></li>
                <li><a href="./attendee.html">Attendee</a></li>
                <li><a href="./hotelroom.php">Hotel Room</a></li>
                <li><a href="./function.html">Function</a></li>
			</ul>		
		</nav>
	</header>

	<div id="main-content">

		<h1 id="page-title">Contact</h1
		<ul>
			<li>Email: river.lawrence@district18.on.ca</li>
			<li>Cell: (555) 555-5555</li>
		</ul>
		
		<p>I endeavour to answer all emails and return all calls within two business days. If the matter is urgent, please include &quot;Urgent&quot; in the subject line of your email or use it in the first few words of your text.</p>
			
	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/drapeau_ontario-ontario_flag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
