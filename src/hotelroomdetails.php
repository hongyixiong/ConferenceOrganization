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
    <a href="index.html">
        <img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
    </a>
    <nav>
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="subcommittees.php">Sub-Committees</a></li>
            <li><a href="./schedule.html">Schedule</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="attendees.html">Attendees</a></li>
            <li><a href="hotelrooms.php">Hotel Rooms</a></li>
            <li><a href="functions.html">Functions</a></li>
        </ul>
    </nav>
</header>

<div id="main-content">
    <h1 id="page-title">Hotel Rooms</h1>

    <br>
    <form action="php/indieroom.php" method="get">
        Room Number: <input type="text" name="roomnumber"><br>
        <input type="submit" value="Submit">
    </form>
    <br>

    <ul>
        <table>
            <th>Room Detail</th>
            <?php
            $room_num = $POST[""];
            $pdo = new PDO('mysql:host=localhost:3307;dbname=conferenceorganization', "root", "");
            $sql = "select room_number from hotel_rooms";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
            echo "<tr><td><a href=\"./index.html\">". $item["room_number"] ."</a></td></tr>";
            }
            ?>
        </table>
    </ul>


</div> <!-- #main-content -->

<footer>
    <img src="./img/drapeau_ontario-ontario_flag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
