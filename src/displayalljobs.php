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
        <!--Should be included in all .php and .html files-->
        <a href="index.php">
            <img src="./img/placeholder_personal_portrait.jpg" alt="Portrait of River Lawrence"/>
        </a>
        <?php
        include 'include\navigationmenu.php';
        ?>
    </header>

	<div id="main-content">
        <h1 id="page-title">All Available Jobs</h1>
        <table>
            <tr>
                <th>Company name</th>
                <th>Job title</th>
                <th>City</th>
                <th>Province</th>
                <th>Salary</th>
            </tr>
            <?php
            $sql = "Select sponsor_companies.name as company_name, job_ads.job_title, 
                    job_ads.city, job_ads.province, job_ads.pay_rate
                    from job_ads
                    join sponsor_companies
                    on job_ads.sponsor_company_id = sponsor_companies.id;";
            $stmt = $pdo->query($sql);

            while ($item = $stmt->fetch()) {
                echo "<tr><td>".$item["company_name"]."</td><td>"
                    .$item["job_title"] . "</td><td>"
                    .$item["city"] . "</td><td>"
                    .$item["province"] . "</td><td>"
                    .$item["pay_rate"] . "</td></tr>";
            }
            ?>
        </table>
	</div> <!-- #main-content -->

    <footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
