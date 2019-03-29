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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">
    <h1 id="page-title">Edit selected session</h1>
    <br>
    <?php
    $sename = $_GET["sename"];
    $newlocation = trim($_POST["newlocation"]);
    $newdate = trim($_POST["newdate"]);
    $starttime = trim($_POST["newstart_time"]);
    $endtime = trim($_POST["newend_time"]);

    $input_start_date_time = $newdate . " ".$starttime;
    $input_end_date_time = $newdate . " ".$endtime;
    if (strlen($newlocation) == 0) {
        echo "<span style=\"color:red\">Must enter a location.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif (strlen($newlocation) > 50) {
        echo "<span style=\"color:red\">Invalid location, must be no more than 50 characters.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif (strlen($starttime) == 0) {
        echo "<span style=\"color:red\">Must enter a start time.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif (strlen($endtime) == 0) {
        echo "<span style=\"color:red\">Must enter a start time.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } elseif (strtotime($input_start_date_time) > strtotime($input_end_date_time)){
        echo "<span style=\"color:red\">Invalid time input, the session must end after start time.</span><br>";
        echo '<Button value = "back" onclick="history.back()">Back</Button>';
    } else {
        $update="UPDATE sessions SET room_location = '$newlocation', start_date_time = '$input_start_date_time', end_date_time = '$input_end_date_time' WHERE name = $sename";

        $stmt =$pdo->query($update);
        header("location: schedule.php");
    }
    ?>

</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
