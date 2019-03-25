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
    <form action="addattendeemessage.php" method="post">
        Attendee Id:
        <input type="text" name="id" required>
        <br>
        Attendee First Name:
        <input type="text" name="first_name" required>
        <br>
        Attendee Last Name:
        <input type="text" name="last_name" required>
        <br>
        Phone Number:
        <input type="text" name="phone_number">
        <br>
        Email:
        <input type="text" name="email">
        <br>
        Attendee Type:
        <select name="sponsorship_level" >
            <option value="student">student</option>
            <option value="professional">professional</option>
            <option value="sponsor">sponsor</option>
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
