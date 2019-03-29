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
    // payment is new information from add attendee step 2 that exists for all registration roles.
    $payment = trim ($_POST["payment"]);

    if (strlen($payment) == 0) {
        echo "<span style=\"color:red\">Please enter amount paid.</span>";
    } elseif (!ctype_digit($payment)) {
        echo "<span style=\"color:red\">Invalid amount paid, must be numerical.</span>";
    } else {
        try {
            $sql = "INSERT INTO attendees (id, first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, $first_name, $last_name, $phone_number, $email]);

            $sql = "INSERT INTO registrations(attendee_id,registration_role,amount_paid) VALUES (?, ?, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, $registration_role, $payment]);
        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        if ($registration_role == "student"){
            $school = trim ($_POST["school"]);
            $room_number = trim ($_POST["room_number"]);
            if (strlen($school) > 50) {
                echo "<span style=\"color:red\">Invalid school name, must be no more than 50 characters.</span>";
            } else {
                try {
                    $sql = "INSERT INTO students(attendee_id, school, hotel_room_number) VALUES (?, ?, ?);";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id, $school, $room_number]);
                } catch (Exception $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                echo "<span style=\"color:green\">New student added successfully.</span>";
            }
        }elseif ($registration_role == "professional"){
            try {
                $sql = "INSERT INTO professionals(attendee_id) VALUES (?);";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
            } catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            echo "<span style=\"color:green\">New professional added successfully.</span>";
        }elseif ($registration_role == "sponsor"){
            $sponsor_company = trim ($_POST["sponsor_company"]);
            $sql = "INSERT INTO sponsors (attendee_id, sponsor_company_id) VALUES (?, ?);";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, $sponsor_company]);
            echo "<span style=\"color:green\">New sponsor representative added successfully.</span>";
        }
    }
    ?>

    <form>
        <input type="button" value="Back to functions" onclick="history.go(-3)">
    </form>
</div> <!-- #main-content -->

<footer>
    <img src="./img/qflag.jpg" alt="Ontario provincial flag"/>
</footer>

</body>
</html>
