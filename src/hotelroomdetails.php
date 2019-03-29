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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">
    <h1 id="page-title">Hotel Room
        <?php
            $rm_num= $_GET['rm_num'];
            echo $rm_num;
        ?>
    </h1>

    <?php
    $sqlCount="SELECT count(*) as count from attendees WHERE id in (SELECT attendee_id FROM students WHERE hotel_room_number='".$rm_num."')";
    $stmtCount = $pdo->query($sqlCount);
    $row = $stmtCount->fetch();
    $count = $row["count"];
    if ($count == 0) {
        echo "There is no student allocated to this room.";
    } else {
        echo "<table>";
        echo "<tr><th>Student name</th></tr>";
        $sql="SELECT first_name,last_name from attendees WHERE id in (SELECT attendee_id FROM students WHERE hotel_room_number='".$rm_num."')";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            echo "<tr><td>". $item["first_name"] ." ". $item["last_name"] ."</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <form>
        <input type="button" value="Back" onclick="history.back()">
    </form>
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
