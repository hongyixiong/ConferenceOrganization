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
        <?php
        include 'include\navigationmenu.php';
        ?>
    </header>

	<div id="main-content">
        <h1 id="page-title">Sponsor Companies</h1>
        <div align="left">
            Click on company name to display new job positions at the company.<br>
            Click <a href="displayalljobs.php">here</a> to display all the jobs.
        </div>
        <table>
            <tr>
                <th>Company name</th>
                <th>Level of sponsorship</th>
                <th>Edit number of emails sent</th>
            </tr>
            <?php
            $sql = "Select name, sponsor_level, id from sponsor_companies;";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                $id = $item["id"];
                echo "<tr><td><a href='jobs.php?comp_id=".$id."'>". $item["name"] ."</a></td><td>" . $item["sponsor_level"] . "</td><td>";
                echo '<a href="editcompanystep1.php?id='.$id.'">Edit</a></td></tr>';
            }
            ?>
        </table>
	</div> <!-- #main-content -->

    <footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
