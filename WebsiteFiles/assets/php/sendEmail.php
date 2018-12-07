<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$toMe = 'thomastorbik@gmail.com';
		
		$header = "From: ".$name."\nEmail: ".$email;
		
		mail($toMe, $subject, $message, $headers);
		//add pop up here saying we sent email.
	}
?>