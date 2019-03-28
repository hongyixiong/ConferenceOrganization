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
    <br>
    <?php
    $sename = $_GET["sename"];
    $newlocation = trim($_POST["newlocation"]);
    $starttime = trim($_POST["newstart_time"]);
    $endtime = trim($_POST["newend_time"]);
    $newdate = trim($_POST["newdate"]);

    if (strlen($newlocation) == 0) {
        echo "<span style=\"color:red\">Must enter a location.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif (strlen($newlocation) > 50) {
        echo "<span style=\"color:red\">Invalid location, must be no more than 50 characters.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif ($starttime =="00:00") {
        echo "<span style=\"color:red\">Must enter a start time.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif ($endtime =="00:00") {
        echo "<span style=\"color:red\">Must enter a start time.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif ( strtotime($starttime) > strtotime($endtime)){
        echo "<span style=\"color:red\">Invalid time input.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    }

    else {
        $inputstarttime = "2019-" . $newdate . " ".$starttime;
        $inputendtime = "2019-" . $newdate . " ".$endtime;
        $room = "room ".$newlocation;

        $update="UPDATE sessions SET room_location = '$room', start_date_time = '$inputstarttime', end_date_time = '$inputendtime' WHERE name = $sename";
 
        $stmt =$pdo->query($update);
        header("location: switchsession.php");
    }
    ?>

</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
