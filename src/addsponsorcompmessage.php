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
    $companyName = trim ($_POST["company_name"]);
    $companyId = trim ($_POST["company_id"]);
    $sponsorshipLevel = trim ($_POST["sponsorship_level"]);
    if (strlen($companyName) == 0 or strlen($companyName) == 0 or strlen($sponsorshipLevel) == 0) {
        echo "<span style=\"color:red\">Must enter company name, company id, and sponsorship level.</span>";
    } elseif (strlen($companyName) > 50) {
        echo "<span style=\"color:red\">Invalid company name, must be no more than 50 characters.</span>";
    } elseif (strlen($companyId) > 9 or !ctype_digit($companyId)) {
        echo "<span style=\"color:red\">Invalid company id, must be all numerical digits and no more than 9 characters.</span>";
    } else {
        try {
            $sqlValidation = "Select count(*) as id_used from sponsor_companies where Id = ?";
            $stmtValidation = $pdo->prepare($sqlValidation);
            $stmtValidation->execute([$companyId]);
            $rowValidation=$stmtValidation->fetch();
            $count = $rowValidation["id_used"];
            if ($count > 0) {
                echo "<span style=\"color:red\">Company id already exists, must be unique.</span>";
            } else {
                $sql = "Insert into sponsor_companies (id, name, number_emails_sent, sponsor_level) values (?, ?, 0, ?);";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$companyId, $companyName, $sponsorshipLevel]);
                echo "<span style=\"color:green\">Sponsor company added successfully.</span>";
            }
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
