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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">

    <h1 id="page-title">Schedule</h1>

    <table>
        <tr>
            <th>Session name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Edit</th>
        </tr>
        <?php
        $date = $_GET['date'];
        $sql = "select name,room_location,date(start_date_time) as date, time(start_date_time)as start_time,time(end_date_time)as end_time 
                from sessions 
                where date(start_date_time)= '". $date ."'
                order by date, start_time";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            $sename = $item['name'];
            echo "<tr><td>"
                .$sename."</td><td name='id'>"
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
