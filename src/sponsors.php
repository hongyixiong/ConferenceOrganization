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
        <?php
        include 'include\navigationmenu.php';
        ?>
    </header>

	<div id="main-content">
        <h1 id="page-title">Sponsor Companies</h1>
        <table>
            <tr>
                <th>Company name</th>
                <th>Level of sponsorship</th>
            </tr>
            <?php
            $sql = "Select name, sponsor_level, id from sponsor_companies;";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                echo "<tr><td><a href='jobs.php?comp_id=".$item["id"]."'>". $item["name"] ."</a></td><td>" . $item["sponsor_level"] . "</td></tr>";
            }
            ?>
        </table>
	</div> <!-- #main-content -->

    <footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
