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

    <h1 id="page-title">
        <?php
        $name = $_GET['name'];
        echo $name;
        ?>
    </h1>

    <table>
        <tr>
            <th>Members</th>
        </tr>
        <?php
        $sql = "select first_name,last_name from committee_members where committee_name= '". $name ."'";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            echo "<tr><td>".$item['first_name']." ".$item['last_name']."</td></tr>";
        }
        ?>
    </table>


</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
