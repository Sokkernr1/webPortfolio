<!--WORK IN PROGRESS-->

<?php
	SESSION_START();
	// Checking For Blank Fields..
	if($_POST["realname"]==""||$_POST["email"]==""||$_POST["subject"]==""||$_POST["message"]==""){
		$_SESSION['result']="Not all fields have been filled out...";
	}else{
	// Check if the "Sender's Email" input field is filled out correctly
		$email=$_POST['email'];
		// Sanitize E-mail Address
		$emailCheck=filter_var($email, FILTER_SANITIZE_EMAIL);
		// Validate E-mail Address
		$emailCheck=filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!($emailCheck)){
			$_SESSION['result']="Failed to validate email address...";
		}else{
			$subjectMatter = $_POST['subject'];
			$subject = '[WEBSITE_MAIL] '.$email.' || '.$subjectMatter;
			$message = $_POST['message'];
			$realname = $_POST['realname'];

			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/plain; charset=utf-8';
			$headers[] = 'From: '.$realname.'<some@email.com>';

			// Message lines should not exceed 70 characters (PHP rule), so wrap it
			$message = wordwrap($message, 70);

			// Send Mail By PHP Mail Function
			if(mail("some@email.com", $subject, $message, implode('\r\n', $headers))){
				$_SESSION['result']="Email was send successfully!<br>I will reply as soon as I can!<br>(Replies could get marked as spam)";
			}else{
				$_SESSION['result']="Error: Failed to send email...";
			}
		}
		header("Location: some website");
	}
?>