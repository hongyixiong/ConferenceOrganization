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
    <?php
    $companyName = $_POST["company_name"];
    $companyId = $_POST["company_id"];
    $sponsorshipLevel = $_POST["sponsorship_level"];
    echo "<h3>Hello $companyName $companyId $sponsorshipLevel</h3>";
    if (strlen($companyName) > 50) {
        echo "<h4>Invalid company name, must be no more than 50 characters.</h4>";
    } elseif (strlen($companyId) > 9 or !ctype_digit($companyId)) {
        echo "<h4>Invalid company id, must be all numerical digits and no more than 9 characters.</h4>";
    } else {
        try {
            $sql = "Insert into sponsor_companies (id, name, number_emails_sent, sponsor_level) 
                    values (?, ?, 0, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$companyId, $companyName, $sponsorshipLevel]);
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
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
