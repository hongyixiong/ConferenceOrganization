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

    <h1 id="page-title">Add Sponsorship Company</h1>
    <form action="addsponsorcompmessage.php" method="post">
        Company name:
        <input type="text" name="company_name">
        <br>
        Company id:
        <input type="text" name="company_id">
        <br>
        Sponsorship level:
        <select name="sponsorship_level" >
            <?php
            $sql = "Select sponsor_level from sponsor_levels order by amount desc;";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                echo "<option value=".$item["sponsor_level"].">".$item["sponsor_level"]."</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Add">
    </form>

</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
