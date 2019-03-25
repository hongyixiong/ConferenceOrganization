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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">
    <h1 id="page-title">Hotel Rooms</h1>

    <div class="list-nav">
        <ul>
            <table>
                <tr>
                    <th>Hotel room number</th>
                </tr>
                <?php
                $sql = "select room_number from hotel_rooms";
                $stmt = $pdo->query($sql);

                while ($item = $stmt->fetch()) {
                    echo "<tr><td><a href='hotelroomdetails.php?rm_num=". $item["room_number"] ."'>". $item['room_number'] ."</a></td></tr>";
                }
                ?>
            </table>
        </ul>
    </div>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
