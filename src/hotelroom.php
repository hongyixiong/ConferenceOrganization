<!DOCTYPE html>
<html>

<head>
    <title>Conference Organizing System | Hotel Room</title>
    <meta charset="utf-8" />
    <meta name="author" content="Group 99"/>
    <meta name="viewport" content="width=device-width,
initial-scale=1">
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
            <li><a href="./subcommittee.html">Sub-Committee</a></li>
            <li><a href="./schedule.html">Schedule</a></li>
            <li><a href="./sponsor.html">Sponsor</a></li>
            <li><a href="./attendee.html">Attendee</a></li>
            <li><a href="./hotelroom.php">Hotel Room</a></li>
            <li><a href="./function.html">Function</a></li>
        </ul>
    </nav>
</header>

<div id="main-content">
    <h1 id="page-title">Hotel Rooms</h1>
    <?php
//    ERROR
    $pdo = new PDO('mysql:host=localhost;dbname=conferenceorganization',"root","");
    $sql = "select room_number from hotel_rooms";

    while ($row = $sql->fetch()){
        echo "<tr>.$row.</tr>";
    }
    ?>
    <p>I endeavour to answer all emails and return all calls within two business days. If the matter is urgent, please include &quot;Urgent&quot; in the subject line of your email or use it in the first few words of your text.</p>

</div> <!-- #main-content -->

<footer>
    <img src="./img/drapeau_ontario-ontario_flag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
