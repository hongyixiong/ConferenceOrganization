<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Sponsors</title>
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
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="subcommittees.php">Sub-Committees</a>
                <div class="dropdown-content">
                    <?php
                    include 'pdo.php';
                    $sql = "select name from sub_committees";
                    $stmt = $pdo->query($sql);

                    while ($item = $stmt->fetch()) {
                        echo "<a href='subcommitteedetails.php?name=". $item["name"] ."'>". $item['name'] ."</a>";
                    }
                    ?>
                </div>
            </li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="attendees.php">Attendees</a></li>
            <li><a href="hotelrooms.php">Hotel Rooms</a></li>
            <li><a href="functions.php">Functions</a></li>
        </ul>
    </nav>
</header>

<div id="main-content">
    <h1 id="page-title">
        <?php
        $comp_id = $_GET['comp_id'];
        echo $comp_id;
        ?>
        Jobs
    </h1>
    <table>
        <tr>
            <th>Job Title</th>
            <th>City</th>
            <th>Province</th>
            <th>Pay Rate</th>
        </tr>
        <?php
        $sql = "Select job_title,city,province,pay_rate from job_ads where sponsor_company_id='".$comp_id."'";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            echo "<tr><td>".$item['job_title']."</td>";
            echo "<td>".$item['city']."</td>";
            echo "<td>".$item['province']."</td>";
            echo "<td>".$item['pay_rate']."</td></tr>";
        }
        ?>
    </table>
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
