<!DOCTYPE html>
<html lang="en">

<head>
	<title>Conference Organizing System | Schedule</title>
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
		<h1 id="page-title">Schedule</h1>
		<p> Various sessions will be held during the conference.
            The conference will start on Monday, April 1st and end on Tuesday, April 2th.</p>
        <table>
            <tr><th>Session name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Edit</th>
            </tr>

            <?php
            $sql = "select name,room_location,date(start_date_time) as date,time(start_date_time)as start_time,time(end_date_time)as end_time 
                    from sessions 
                    order by date, start_time";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                $sename = $item['name'];
                echo "<tr><td>"
                    .$item['name']."</td><td name='id'>"
                    .$item['room_location']."</td><td>"
                    .$item['date']."</td><td>"
                    .$item['start_time']."</td><td>"
                    .$item['end_time']."</td><td>";
                echo '<a href="editsessionstep1.php?sename='.$sename.'">edit</a></td>';
            }
            ?>
        </table>

	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
