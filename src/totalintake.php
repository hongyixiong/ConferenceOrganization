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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">

    <h1 id="page-title">Total Intakes</h1>
    <?php
    $sql_registration_pay = "Select sum(amount_paid) as total_pay from registrations;";
    $sql_sponsorship_pay = "Select sum(amount) as total_pay from sponsor_companies 
      join sponsor_levels on sponsor_companies.sponsor_level = sponsor_levels.sponsor_level;";

    $stmt1 = $pdo->query($sql_registration_pay);
    $stmt2 = $pdo->query($sql_sponsorship_pay);
    $item1 = $stmt1->fetch();
    $item2 = $stmt2->fetch();
    $intake_registration = (int) $item1["total_pay"];
    $intake_sponsorship = (int) $item2["total_pay"];
    $total = $intake_registration + $intake_sponsorship;
    echo "<div align='left'>";
    echo "The total registration fee is $".$intake_registration.".";
    echo "<br>";
    echo "The total sponsorship amount is $".$intake_sponsorship.".";
    echo "<br>";
    echo "The total intake is $".$total.".";
    echo "</div>";
    ?>
    <br>
    <input type="button" value="Back" onclick="history.back()">
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
