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
        <li class="dropdown"><a href="schedule.php">Schedule</a>
           <div class="dropdown-content">
                <?php
                include 'pdo.php';
                $sql = "select DAYOFMONTH(start_date_time) as day from sessions group by day";
                $stmt = $pdo->query($sql);
                while ($item = $stmt->fetch()) {
                    echo "<a href='scheduledetails.php?day=". $item["day"] ."'> date 2-". $item['day'] ."</a>";
                }
                ?>
            </div>
        </li>
        <li><a href="sponsors.php">Sponsors</a></li>
        <li><a href="attendees.php">Attendees</a></li>
        <li><a href="hotelrooms.php">Hotel Rooms</a></li>
        <li><a href="functions.php">Functions</a></li>
    </ul>
</nav>
