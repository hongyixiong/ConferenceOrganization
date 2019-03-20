<!DOCTYPE html>
<html>

	<body>
		<h2>Login Infomation</h2>
		<table>
		<tr><th>Account</th><th>Password</th></tr>

		<?php
		$givenAccount = $_POST["customer_login_account"];                      
		$givenPassword = $_POST["customer_login_password"];
		echo "<h3>Hello $givenAccount $givenPassword</h3>";

		#run a query to get the project names and locations of the person's department.
		$dbh = new PDO('mysql:host=localhost;dbname=theatre_complexes_db', "root", "");
		#user name and password for mysql when using XAMPP is "root" and a blank password
		$rows = $dbh->query("select account_no, password from Customer where account_no = $givenAccount");
		foreach($rows as $row) {
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
		    }
		    $dbh = null;
		?>

		</table>


 	</body>
</html>
