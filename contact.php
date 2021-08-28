<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">  
		<title>Paul Sohns - Contact form</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/contact.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/footer.css">
	</head>

	<body>
		<div class="header">
			<div class="title">
				<a href="index.html"><h1>Paul Sohns - Portfolio</h1></a>
			</div>
			<div class="links">
				<a href="contact.php"><h2>Contact</h2></a>
			</div>
			<div class="links">
				<a href="projectList.html"><h2>My work</h2></a>
			</div>
			<div class="links">
				<a href="aboutMe.html"><h2>About me</h2></a>
			</div>
		</div>

		<div class="contactForm">
			<form method="post" action="send.php">
				<p>Your name:</p>
				<input name="realname" id="rName" type="text" required><br>
				<p>Your e-mail:</p>
				<input name="email" id="mail" type="email" required>
				<p>Confirm e-mail:</p>
				<input name="emailConf" id="mailConf" type="email" onblur="confirmEmail()" required>
				<p>Your subject:</p>
				<input name="subject" id="sub" type="text" required><br>
				<p>Your message:</p>
				<textarea cols="40" rows="10" name="message" id="messageField" required></textarea><br>
				<input id="submitBtn" type="submit" value="Send">
			</form>
		</div>

		<div class="contactStatus">
			<h4>
				<?php 
					SESSION_START();
					if(isset($_SESSION['result'])){
						if(!($_SESSION['result']=='')){
							$result = $_SESSION['result'];
							echo $result;
						}else{
							echo 'All emails are sent to: paul.sohns@web.de';
						}
					}else{
						echo 'All emails are sent to: paul.sohns@web.de';
					}
					SESSION_DESTROY();
				?>
			</h4>
		</div>

		<div class="footer">
			<h3><br>Information</h3>
			<br>
			<div class="row">
				<div class="col-md-4">
					<h5>Paul Sohns<br>Germany, Lower Saxony<br>paul.sohns@web.de</h5>
				</div>
				<div class="col-md-4">
					<h5>Hosted by: netcup.eu</h5>
				</div>
				<div class="col-md-4">
					<h5>Feel free to contact me in case of<br>any questions, requests, etc.!</h5>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function confirmEmail() {
				var email = document.getElementById("mail").value
				var confemail = document.getElementById("mailConf").value
				if(email != confemail) {
					alert('Email Not Matching!');
					document.getElementById("mailConf").value='';
				}
			}
		</script>
	</body>
</html>