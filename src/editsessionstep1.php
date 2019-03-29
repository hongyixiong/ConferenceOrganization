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
    <table>
        <tr><th>Session name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Start time</th>
            <th>End time</th>
        </tr>
        <?php
        $sename = $_GET['sename'];
        $sql = "select name,room_location,date(start_date_time) as date,time(start_date_time)as start_time,time(end_date_time)as end_time 
                from sessions 
                where name= '". $sename ."'
                order by date, start_time";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            $sename = $item['name'];
            $room_location = $item['room_location'];
            $date = $item['date'];
            $start_time = $item['start_time'];
            $end_time = $item['end_time'];
            echo "<tr><td>"
                .$sename."</td><td name='id'>"
                .$room_location."</td><td>"
                .$date."</td><td>"
                .$start_time."</td><td>"
                .$end_time."</td>";
        }
        ?>
    </table>
    <br>
    <form action="editsessionstep2.php?sename='<?php echo $sename?>'" method="post">
        <ul class="form-style">
            <li>
                <label>Enter a room number:</label>
                <input type="text" name="newlocation" value="<?php echo $room_location?>">
            </li>

            <li>
                <label>Select a date:</label>
                <?php
                echo "<input type='hidden' name='sename' value=$sename>";
                echo "<select name='newdate'>";
                //        $sql = "Select distinct date(start_date_time) as date from sessions order by date";
                //        $stmt = $pdo->query($sql);
                //        while ($item = $stmt->fetch()) {
                //            echo "<option value=".$item["date"].">".$item["date"]."</option>";
                //        }
                if (strtotime($date) == strtotime('2019-04-02')){
                    echo "<option id='2019-04-01' value='2019-04-01'>2019-04-01</option>";
                    echo "<option id='2019-04-02' value='2019-04-02' selected='selected'>2019-04-02</option>";
                } else {
                    echo "<option id='2019-04-01' value='2019-04-01' selected='selected'>2019-04-01</option>";
                    echo "<option id='2019-04-02' value='2019-04-02'>2019-04-02</option>";
                }
                echo "</select>";
                ?>
            </li>

            <li>
                <label>Enter start time:</label>
                <input type="text" name="newstart_time" value="<?php echo $start_time?>">
            </li>

            <li>
                <label>Enter end time:</label>
                <input type="text" name="newend_time" value="<?php echo $end_time?>">
            </li>

            <li>
                <input type="submit" value="Complete">
        <!--        <input type="submit" value="Create new session" formaction="/ConferenceOrganization/src/createsessionmessage.php">-->
                <input type="button" value="Back" onclick="history.back()">
            </li>
        </ul>
    </form>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
