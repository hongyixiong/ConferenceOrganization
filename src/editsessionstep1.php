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

    <h1 id="page-title">Edit selected session</h1>
    
     <table>
        <tr>
            <th>name</th>
            <th>location</th>
            <th>date</th>
            <th>start time</th>
            <th>end time</th>
        </tr>
        <?php
        $sename = $_GET['sename'];
        $sql = "select name,room_location,DAYOFMONTH(start_date_time) as day,cast(start_date_time as time)as start_time,cast(end_date_time as time)as end_time from sessions where name= '". $sename ."'";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            echo "<tr><td>".$item['name']."</td><td>"
                .$item['room_location']."</td><td>2-"
                .$item['day']."</td><td>"
                .$item['start_time']."</td><td>"
                .$item['end_time']."</td></tr>";
        }
        ?>
    </table>
    <br>
    <br>
    <form action="editsessionstep2.php?sename='<?php echo $sename?>'" method="post">
        Enter room number:
        <input type="text" name="newlocation">
        <br>
        Select date:
        <select name="newdate">
            <option value="02-07">2-7</option>
            <option value="02-08">2-8</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        Change start time:
        <input type="text" name="newstart_time" value="00:00">
        <br>
        Change end time:
        <input type="text" name="newend_time" value="00:00">
        <br>
        <input type="submit" value="Next">
        <input type="button" value="Back" onclick="history.back()">
    </form>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
