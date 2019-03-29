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
            $comp_id = $_GET['id'];
            $sql = "Select name, number_emails_sent from sponsor_companies where id='".$comp_id."'";
            $stmt = $pdo->query($sql);
            $item = $stmt->fetch();
            echo $item['name'];
            ?>
        </h1>
        <form action="editcompanystep2.php" method="post">
            <?php
            echo "<input type='hidden' name='comp_id' value=$comp_id>";
            $number_emails_sent = $item["number_emails_sent"];
            echo "<input type='text' name='number_emails_sent' value='$number_emails_sent'>";
            echo "<br>";
            echo "<input type='submit' value='Confirm'>";
            ?>
        </form>

	</div> <!-- #main-content -->

    <footer>
		<img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
	</footer>

</body>
</html>
