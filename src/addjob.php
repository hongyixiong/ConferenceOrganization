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

		<h1 id="page-title">Add job</h1>
		<form action="addjobstep1.php" method="post">
        <ul class="form-style">
            <li>
                <label>Select a company:</label>
                <?php
                echo "<select name='comid'>";
                        $sql = "Select id,name from sponsor_companies";
                        $stmt = $pdo->query($sql);
                        while ($item = $stmt->fetch()) {
                        echo "<option value=".$item['id'].">".$item["name"]."</option>";
                        }
                echo "</select>";
                ?>
            </li>

            <li>
                <label>Enter job title:</label>
                <input type="text" name="title">
            </li>
            <li>
                <label>Enter city:</label>
                <input type="text" name="city">
            </li>
            <li>
                <label>Enter province:</label>
                <input type="text" name="province">
            </li>
            <li>
                <label>Enter pay rate:</label>
                <input type="text" name="pay">
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
