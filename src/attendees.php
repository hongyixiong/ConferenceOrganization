<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Attendees</title>
	<meta charset="utf-8" />
	<meta name="author" content="Group 99"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif|Josefin+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">	
	<link rel="stylesheet" href="css/responsive.css">	
</head>

<body>
	<header>
		<a href="index.php">
			<img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
		</a>
        <?php
        include 'include\navigationmenu.php';
        ?>
	</header>

	<div id="main-content">
		<h1 id="page-title">Attendees</h1>
        <div class="attendee_tb">
            <table>
                <th>Students</th>
                <?php
                $sql = "select first_name,last_name from attendees where id in (select attendee_id from students)";
                $stmt = $pdo->query($sql);

                while ($item = $stmt->fetch()) {
                    echo "<tr><td>".$item['first_name']." ".$item['last_name']."</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="attendee_tb">
            <table>
                <th>Professionals</th>
                <?php
                $sql = "select first_name,last_name from attendees where id in (select attendee_id from professionals)";
                $stmt = $pdo->query($sql);

                while ($item = $stmt->fetch()) {
                    echo "<tr><td>".$item['first_name']." ".$item['last_name']."</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="attendee_tb">
            <table>
                <th>Sponsors</th>
                <?php
                $sql = "select first_name,last_name from attendees where id in (select attendee_id from sponsors)";
                $stmt = $pdo->query($sql);

                while ($item = $stmt->fetch()) {
                    echo "<tr><td>".$item['first_name']." ".$item['last_name']."</td></tr>";
                }
                ?>
            </table>
        </div>



	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
