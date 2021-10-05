<?php
	$firstName = $_POST['firstName'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
  $userName = $_POST['userName'];
  $number = $_POST['number'];
	$password = $_POST['password'];
  $confirmPassword = $_POST['confirmpassword'];
	
 

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, slastname, gender, email, confirmpassword, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $slastname, $email, $userName,$number, $password,  $confirmPassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>