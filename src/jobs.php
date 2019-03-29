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
    <?php
    include 'include\navigationmenu.php';
    ?>
</header>

<div id="main-content">
    <h1 id="page-title">
        Jobs Posted By
        <?php
        $comp_id = $_GET['comp_id'];
        $sql_comp_name = "Select name from sponsor_companies where id='".$comp_id."'";
        $stmt_comp_name = $pdo->query($sql_comp_name);
        $item_comp_name = $stmt_comp_name->fetch();
        echo $item_comp_name['name'];
        ?>
    </h1>
    <table>
        <tr>
            <th>Job Title</th>
            <th>City</th>
            <th>Province</th>
            <th>Pay Rate</th>
        </tr>
        <?php
        $sql = "Select job_title,city,province,pay_rate from job_ads where sponsor_company_id='".$comp_id."'";
        $stmt = $pdo->query($sql);

        while ($item = $stmt->fetch()) {
            echo "<tr><td>".$item['job_title']."</td>";
            echo "<td>".$item['city']."</td>";
            echo "<td>".$item['province']."</td>";
            echo "<td>".$item['pay_rate']."</td></tr>";
        }
        ?>
    </table>
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
