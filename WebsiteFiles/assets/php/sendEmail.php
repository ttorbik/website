<?php
    
if(!isset($_POST['submit'])) {
    //This page should not be accessed directly. Need to submit the form.
    //echo "error; you need to submit the form!";
}
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    //validate
    if(empty($name)){
        echo "Please enter your name.";
        exit;
    } else if(empty($email)) {
        echo "Please enter your email.";
        exit;
    } else if(empty($subject)) {
        echo "Please enter a subject.";
        exit;
    } else if(empty($message)) {
        echo "Please enter a message.";
        exit;
    }
    
    if(IsInjected($email)) {
        echo "Bad email value!";
        exit;
    }
    
    //echo "Name: ".$name."\nEmail: ".$email."\nSubject: ".$subject."\nMessage: ".$message;
    $originalMessage = $message;
    $message = "From: " . $name . "\n" . "From Email: " . $email . "\n\n" . "Message: " . $originalMessage;
    
    $toMe = "ttorbik@thomastorbik.com";//'thomastorbik@gmail.com';
    
    $headers = "From: ".$name."\nEmail: ".$email;
    
    if(mail($toMe, $subject, $message, $headers)) {
        //echo "Email sent!";
        header('Location: https://thomastorbik.com');
        //send a popup here for html to display success post.
        exit;
    } else {
        header('Location: https://thomastorbik.com');
        //send a popup here for html to display failed post.
        exit;
        //echo "not sent.";
    }
    
    //add pop up here saying we sent email.
	
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
