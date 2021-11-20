<?php 

include 'config.php';

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['msg'];
	$query = $_POST['query'];



		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (fullname, email, subject, message, query)
					VALUES ('$fullname', '$email','$subject','$msg','$query')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Thank you for Contacting')</script>";
				$fullname = "";
				$email = "";
				$subject = "";
				$msg = "";
				$query = "";

			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Contact Us Page</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Contact Us Page</p>
			<div class="input-group">
				<input type="text" placeholder="Full Name" name="fullname" value="<?php echo $fullname; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="input-group">
				<input type="text" placeholder="Subject" name="subject" required>
			</div>

			<div class="input-group">
				<input type="textarea" placeholder="Message" name="msg" required>
			</div>

			<div class="input-group">
				<input type="textarea" placeholder="Query" name="query" required>
			</div>

			<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>