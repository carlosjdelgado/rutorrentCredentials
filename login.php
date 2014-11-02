<?php
/**********************************************************
* rutorrent Credentials: Basic security for rutorrent
* Author: Carlos Jimenez Delgado (mail@carlosjdelgado.com)
* License: GNU General Public License
**********************************************************/
	session_start();
	include_once 'conf.php';
	
	$errorMsg = "";
	if (isset($_POST['username']) && isset($_POST['password'])) {
	
		if ($_POST['username'] == $c_username && $_POST['password'] == $c_password) {
			
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			
			if (isset($_POST['keep']) && $_POST['keep'] == 'on') {
				// set cookies
				setcookie('username',$_POST['username'],time() + (86400 * 7),"/");
				setcookie('password',$_POST['password'],time() + (86400 * 7),"/");
			}
			
			header('Location: ../../');
		}
		else {
			if ($_POST['username'] == '') {
				$errorMsg = '_[ENTER_USERNAME]_' . '<br>';
			}
			if ($_POST['password'] == '') {
				$errorMsg .= '_[ENTER_PASSWORD]_';
			}
				
			if ($errorMsg == '') {
				$errorMsg = '_[NOT_CORRECT]_';
			}
		}
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<title>Login - rutorrent</title>
		<link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
		<!-- <script type="text/javascript" src="lang/langs.js"></script>-->
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript">
			if (typeof theUILang === 'undefined') var theUILang={};
			document.write("<scr" + "ipt type=\"text/javascript\" src=\"../../lang/langs.js\"></scr" + "ipt>");
			document.write("<scr" + "ipt type=\"text/javascript\" src=\"./lang/"+GetActiveLanguage()+".js\"></scr" + "ipt>");
		</script>
	</head>

	<body>
<?php 
	if ($errorMsg != '') {
?>
		<div class="error-msg" id="error-msg">
			<?php echo $errorMsg; ?>				
		</div>
<?php 
	}
?>
		<div class="login-card">
			<h1><img src="img/logo.png"><span id="login-title">Login</span></h1>
			<form method="POST">
			    <input id="username" type="text" name="username" placeholder="">
			    <input id="password" type="password" name="password" placeholder="">
				<input type="checkbox" name="keep">
				<label id="keep" for="keep"></label>
			    <input id="login" type="submit" name="login" class="login login-submit" value="">
			</form>
		</div>
	</body>
</html>

<script>
	$( document ).ready(function() {
		$('#username').focus();

		$('#login-title').text(theUILang.loginTitle);
		$('#username').attr("placeholder", theUILang.user);
		$('#password').attr("placeholder", theUILang.password);
		$('#keep').text(theUILang.rememberMe);
		$('#login').val(theUILang.login);
		
		var errortext = $('#error-msg').html();
		errortext = errortext.replace("_[ENTER_USERNAME]_", theUILang.errorNotUsername); 
		errortext = errortext.replace("_[ENTER_PASSWORD]_", theUILang.errorNotPassword); 
		errortext = errortext.replace("_[NOT_CORRECT]_", theUILang.errorNoCorrect); 
		$('#error-msg').html(errortext);
	});
</script>