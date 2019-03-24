<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conference Organizing System | Sub-Committees</title>
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

		<h1 id="page-title">Sub-Committees</h1
		<ul>
            <?php
            $sql = "select name from sub_committees";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                echo "<li>". $item["name"] ."</li>";
            }
            ?>
		</ul>

	</div> <!-- #main-content -->
		
	<footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
