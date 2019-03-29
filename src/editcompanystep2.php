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
        <?php
        include 'include\navigationmenu.php';
        ?>
    </header>

	<div id="main-content">
        <h1 id="page-title">
            Edit number of emails sent for
            <?php
            $comp_id = $_POST['comp_id'];
            $sql = "Select name, sponsor_levels.sponsor_level, max_email_number
                    from sponsor_companies 
                    join sponsor_levels
                    on sponsor_companies.sponsor_level = sponsor_levels.sponsor_level
                    where id='".$comp_id."'";
            $stmt = $pdo->query($sql);
            $item = $stmt->fetch();

            $comp_name = $item['name'];
            echo $comp_name;
            ?>
        </h1>
        <?php

        $number_emails_sent = trim($_POST["number_emails_sent"]);
        $sponsor_level = $item['sponsor_level'];
        $max_email_number = $item['max_email_number'];
        if (strlen($number_emails_sent) == 0) {
            echo "<span style=\"color:red\">Must enter number of emails sent.</span>";
        } elseif ($number_emails_sent < 0) {
            echo "<span style=\"color:red\">Number of emails sent must be greater than 0.</span>";
        } elseif ($number_emails_sent > $max_email_number) {
            if ($sponsor_level == "Bronze") {
                echo "<span style=\"color:red\">Companies at ".strtolower($sponsor_level)." level cannot send any email.</span>";
            } else {
                echo "<span style=\"color:red\">Companies at ".strtolower($sponsor_level)." level cannot send more than $max_email_number emails.</span>";
            }
        } else {
            try {
                $sql = "update sponsor_companies set number_emails_sent = $number_emails_sent where id='".$comp_id."'";
                $pdo->query($sql);
                echo "<span style=\"color:green\">Number of emails updated successfully.</span>";
            } catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        ?>
        <form>
            <input type="button" value="Back to sponsors" onclick="history.go(-2)">
        </form>
	</div> <!-- #main-content -->

    <footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
