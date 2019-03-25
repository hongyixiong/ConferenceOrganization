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

    <h1 id="page-title">Add Attendee</h1>
    <?php
    $first_name = trim ($_POST["first_name"]);
    $last_name = trim ($_POST["last_name"]);
    $id = trim ($_POST["id"]);
    try {
        $sqlValidation = "Select count(*) as id_used from attendees where Id = ?";
        $stmtValidation = $pdo->prepare($sqlValidation);
        $stmtValidation->execute([$id]);
        $rowValidation=$stmtValidation->fetch();
        $count = $rowValidation["id_used"];
        if ($count > 0) {
            echo "<span style=\"color:red\">Company id already exists, must be unique.</span>";
        } else {
            $sql = "Insert into attendees (id, first_name, last_name) values (?, ?, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, $first_name, $last_name]);
            echo "<span style=\"color:green\">New attendee added successfully.</span>";
        }
    } catch (Exception $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    ?>

    <form>
        <input type="button" value="Back" onclick="history.back()">
    </form>
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
