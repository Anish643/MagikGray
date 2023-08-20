<?php
	$firstName = $_POST['Name'];
	$email = $_POST['email'];
	$message = $_POST['Message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name, email, message) values(?, ?, ?)");
		$stmt->bind_param("sssssi", $Name, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>