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
        <?php
        include 'include\navigationmenu.php';
        ?>
	</header>

	<div id="main-content">

		<h1 id="page-title">Sub-Committees</h1>
        <img id="img-title" src="./img/committee.jpg" alt="committee picture"/>
		<ul class="list-style">
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
		<img src="./img/qflag.jpg" alt="Queens flag"/>
	</footer>

</body>
</html>
