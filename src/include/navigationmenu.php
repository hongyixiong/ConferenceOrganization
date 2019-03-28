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
                $sql = "select DISTINCT date(start_date_time) as date
                        from sessions 
                        order by date;";
                $stmt = $pdo->query($sql);
                while ($item = $stmt->fetch()) {
                    echo "<a href='scheduledetails.php?date=". $item["date"] ."'>" . $item['date'] ."</a>";
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
