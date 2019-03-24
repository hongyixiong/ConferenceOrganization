<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Hotel Rooms</title>
    <meta charset="utf-8" />
    <meta name="author" content="Group 99"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif|Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<header>
    <a href="index.php">
        <img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
    </a>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="subcommittees.php">Sub-Committees</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="./hotelrooms.php">Hotel Rooms</a></li>
            <li><a href="functions.php">Functions</a></li>
        </ul>
    </nav>
</header>

<div id="main-content">
    <h1 id="page-title">Hotel Rooms</h1>

<!--    <br>-->
<!--    <form action="php/indieroom.php" method="get">-->
<!--        Room Number:-->
<!--        <input type="text" name="roomnumber"><br>-->
<!--        <input type="submit" value="333">-->
<!--    </form>-->
<!--    <br>-->
    <div class="list-nav">
        <ul>
            <?php
            //            $pdo = new PDO('mysql:host=localhost:3307;dbname=conferenceorganization', "root", "");
            $pdo = new PDO('mysql:host=localhost:3306;dbname=conferenceorganization', "root", "");
            $sql = "select room_number from hotel_rooms";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
    //                echo "<tr><td class='roomlink'><form action='hotelroomdetails.phpp' method='get'>";
    //            echo "<input type='submit' name=".$item['room_number']." value=".$item['room_number']." </form></td></tr>";
                echo "<li><a href='hotelroomdetails.php?rm_num=". $item["room_number"] ."'>". $item['room_number'] ."</a></li>";
            }
            ?>
        </ul>
    </div>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
