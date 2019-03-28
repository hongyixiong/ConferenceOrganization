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

    <h1 id="page-title">Add an Attendee</h1>
    <?php
    $id = trim ($_POST["id"]);
    $first_name = trim ($_POST["first_name"]);
    $last_name = trim ($_POST["last_name"]);
    $phone_number = trim ($_POST["phone_number"]);
    $email = trim ($_POST["email"]);
    $registration_role = trim ($_POST["registration_role"]);

    if (strlen($id) == 0 or strlen($first_name) == 0 or strlen($last_name) == 0
        or strlen($email) == 0 or strlen($registration_role) == 0) {
        echo "<span style=\"color:red\">Must enter attendee id, first name, last name, email, and attendee type.</span>";
    } elseif (strlen($first_name) > 50) {
        echo "<span style=\"color:red\">Invalid first name, must be no more than 50 characters.</span>";
    } elseif (strlen($last_name) > 50) {
        echo "<span style=\"color:red\">Invalid last name, must be no more than 50 characters.</span>";
    } elseif (strlen($phone_number) > 30) {
        echo "<span style=\"color:red\">Invalid phone number, must be no more than 30 characters.</span>";
    } elseif (strlen($email) > 30) {
        echo "<span style=\"color:red\">Invalid email, must be no more than 30 characters.</span>";
    } elseif (strlen($id) > 10 or !ctype_digit($id)) {
        echo "<span style=\"color:red\">Invalid Attendee id, must be all numerical digits and no more than 10 characters.</span>";
    } else {
        try {
            $sqlValidation = "Select count(*) as id_used from attendees where Id = ?";
            $stmtValidation = $pdo->prepare($sqlValidation);
            $stmtValidation->execute([$id]);
            $rowValidation=$stmtValidation->fetch();
            $count = $rowValidation["id_used"];
            if ($count > 0) {
                echo "<span style=\"color:red\">Attendee id already exists in database.</span>";
            } else {
                if ($registration_role == "student"){
                    echo "<form action='addattendeestep3.php' method='post'>";
                    // Pass these information to next page.
                    echo "<input type='hidden' name='id' value=$id>";
                    echo "<input type='hidden' name='first_name' value=$first_name>";
                    echo "<input type='hidden' name='last_name' value=$last_name>";
                    echo "<input type='hidden' name='phone_number' value=$phone_number>";
                    echo "<input type='hidden' name='email' value=$email>";
                    echo "<input type='hidden' name='registration_role' value=$registration_role>";

                    // Below are additional information needed for students.
                    echo "<ul class='form-style'><li><label>School name:</label> ";
                    echo "<input type='text' name='school'></li>";
                    echo "<li><label>Room number: </label>";
                    echo "<select name='room_number'>";
//                    $sql = "Select room_number from hotel_rooms order by room_number asc;";
                    $sql = "Select room_number
                            from (
                            Select hotel_rooms.room_number as room_number, count(students.hotel_room_number) as occupancy, hotel_rooms.number_of_beds
                            from students
                            right join hotel_rooms
                            on students.hotel_room_number = hotel_rooms.room_number
                            group by hotel_rooms.room_number
                            HAVING occupancy < hotel_rooms.number_of_beds
                            ) as temp;";
                    $stmt = $pdo->query($sql);
                    while ($item = $stmt->fetch()) {
                        echo "<option value=".$item["room_number"].">".$item["room_number"]."</option>";
                    }
                    echo "</select></li>";
                    echo "<li><label>Amount paid: </label>";
                    echo "<input type='text' name='payment' value='50'>";
                    echo "</li>";
                    echo "<li><input type='submit' value='Complete'></li></ul>";
                    echo "</form>";
                }elseif ($registration_role == "professional"){
                    echo "<form action='addattendeestep3.php' method='post'>";
                    // Pass these information to next page.
                    echo "<input type='hidden' name='id' value=$id>";
                    echo "<input type='hidden' name='first_name' value=$first_name>";
                    echo "<input type='hidden' name='last_name' value=$last_name>";
                    echo "<input type='hidden' name='phone_number' value=$phone_number>";
                    echo "<input type='hidden' name='email' value=$email>";
                    echo "<input type='hidden' name='registration_role' value=$registration_role>";

                    // Below are additional information needed for professionals.
                    echo "Amount paid: ";
                    echo "<input type='text' name='payment' value='100'>";
                    echo "<br>";
                    echo "<input type='submit' value='Complete'>";
                    echo "</form>";
                }elseif ($registration_role == "sponsor"){
                    echo "<form action='addattendeestep3.php' method='post'>";
                    // Pass these information to next page.
                    echo "<input type='hidden' name='id' value=$id>";
                    echo "<input type='hidden' name='first_name' value=$first_name>";
                    echo "<input type='hidden' name='last_name' value=$last_name>";
                    echo "<input type='hidden' name='phone_number' value=$phone_number>";
                    echo "<input type='hidden' name='email' value=$email>";
                    echo "<input type='hidden' name='registration_role' value=$registration_role>";

                    // Below are additional information needed for sponsors.
                    echo "<input type='hidden' name='payment' value='0'>";
                    echo "Please select a company from the list: ";
                    echo "<select name='sponsor_company'>";
                    $sql = "Select id, name from sponsor_companies";
                    $stmt = $pdo->query($sql);
                    while ($item = $stmt->fetch()) {
                        echo "<option value=".$item["id"].">".$item["id"].": ".$item["name"]."</option>";
                    }
                    echo "</select>";
                    echo "<br>";
                    echo "<input type='submit' value='Complete'>";
                    echo "</form>";
                } else {
                    echo "<span style=\"color:red\">Invalid attendee type.</span>";
                }
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
