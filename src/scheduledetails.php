<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Sub-Committees</title>
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

    <table>
        <tr>
            <th>name of the session</th>
            <th>location</th>
            <th>start time</th>
            <th>endtime</th>
        </tr>
        <?php
        $day = $_GET['day'];
        $sql = "select name,room_location,cast(start_date_time as time)as start_time,cast(end_date_time as time)as end_time from sessions where DAYOFMONTH(start_date_time)= '". $day ."'";
        $stmt = $pdo->query($sql); 

        while ($item = $stmt->fetch()) {
            echo "<tr><td>".$item['name']."</td><td>"
                .$item['room_location']."</td><td>"
                .$item['start_time']."</td><td>"
                .$item['end_time']."</td></tr>";
        }
        ?>
    </table>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
