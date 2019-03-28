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

    <h1 id="page-title">Choose a session to edit</h1>
    <table>
        <caption> Session list </caption>
        <tr><th>Session name</th>
        	<th>location</th>
        	<th>date</th>
        	<th>start time</th>
        	<th>end time</th>
        	<th>Edit</th></tr>

        <?php
            $sql = "select name,room_location,DAYOFMONTH(start_date_time) as day,cast(start_date_time as time)as start_time,cast(end_date_time as time)as end_time from sessions order by start_date_time";
            $stmt = $pdo->query($sql); 

        while ($item = $stmt->fetch()) {
            $sename = $item['name'];
            echo "<tr><td>"
                .$item['name']."</td><td name='id'>"
                .$item['room_location']."</td><td>2-"
                .$item['day']."</td><td>"
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
