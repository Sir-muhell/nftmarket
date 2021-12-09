<?php
									/****** Helper Functions********/
function clean($string) {

	return htmlentities($string);
}

function email_exist($email) {

	$sql = "SELECT * FROM users WHERE `email` = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}

function username_exist($uname) {

	$sql = "SELECT * FROM users WHERE `username` = '$uname'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}


function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}





/** VALIDATE USER REGISTRATION **/

if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword'])) {

$name 			= clean($_POST['uname']);
$email	 		= clean($_POST['email']);
$pword    		= clean($_POST['pword']);
$cpword    		= clean($_POST['cpword']);


if(email_exist($email)) {

			echo "Sorry! That email already has an account";
		} else {

if(username_exist($name)) {

			echo "That username has been taken!";
		} else {


if($pword != $cpword) {

			echo "Password doesn`t match!";
			
		} else {
			register($name, $email, $pword);
		}
	}
	}
	} // post request


	

/** REGISTER USER **/
function register($name, $email, $pword) {

	$uname = escape($name);
	$uemail = escape($email);
	$password = md5($pword);

	$activator = token_generator();
	$date = date('Y:m:d');
	
$sql = "INSERT INTO users(`username`, `email`, `password`, `date_reg`, `activator`, `activated`)";
$sql.= " VALUES('$uname', '$uemail', '$password', '$date', '$activator', '0')";
$result = query($sql);

//redirect to verify function
$subj = "VERIFY YOUR EMAIL";
$link = "https://thenfthood.com/./activate?key=".$activator;

$_SESSION['usermail'] = $email;

mail_mailer($email, $activator, $subj, $link);

//redirect to verify page
echo 'Loading...Please Wait!';
echo '<script>window.location.href ="./verify"</script>';
 }



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $link) {

$to 		= $email;
$from 		= "noreply@nfthood.com";
$cmessage 	= "Best Regards<br/> <i>Nft Hood</i>";

$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = '';
$url  = '';

$body = "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for signing up.;</p>";
$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to activate your email Address</b></a></p>
<br/>";

$send = mail($to, $subject, $body, $headers);
}

/** SIGN IN USER **/
 	if(isset($_POST['username']) && isset($_POST['password'])) {

			$username        = clean(escape($_POST['username']));
			$password   	 = md5($_POST['password']);

			$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
			$result = query($sql);
			if(row_count($result) == 1) {

				$row 	= mysqli_fetch_array($result);
				$user 	= $row['username'];
				$active = $row['activated'];
				$email 	= $row['email'];

				if ($active == 0) {

					$activator = token_generator();

					$_SESSION['usermail'] = $email;

					//update activation link
					$ups = "UPDATE users SET `activator` = '$activator' WHERE `usname` = '$username'";
					$ues = query($ups);

					//redirect to verify function
					$subj    = "VERIFY YOUR EMAIL";
					$link 	 = "https://thenfthood/./activate?key=".$activator;

					mail_mailer($email, $activator, $subj, $link);

					//redirect to verify page
					echo '<script>window.location.href ="verify.php"</script>';	
					
				}  else {

					if($username == $user) {
						
						$_SESSION['login'] = $username;

						echo 'Loading...Please Wait';	

						echo '<script>window.location.href ="./"</script>';	
					} else {

						echo "This username doesn't have an account.";
					}

			} 

		}else {

		         echo 'Loading...Please Wait!';
                         echo '<script>window.location.href ="./forgot"</script>';;
		}
	}



/** FORGOT PASSWORD **/
if(isset($_POST['ffemail'])) {
	
	$email  = clean(escape($_POST['ffemail']));

	if(!email_exist($email)) {

		echo "Sorry! This email doesn't exit";
		
	} else {

	$activator = token_generator();

	$ssl = "UPDATE users SET `activator` = '$activator' WHERE `email` = '$email'";
	$rsl = query($ssl);

	//redirect to verify function
	$subj = "RESET YOUR PASSWORD";
	$link = "https://thenfthood.com/./recover?key=".$activator;

	$_SESSION['email'] = $email;

	fgmail_mailer($email, $activator, $subj, $link);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./reset"</script>';

	}
}


/** FORGOT PASSWORD EMAIL **/
function fgmail_mailer($email, $activator, $subj, $link) {
	
$to 		= $email;
$from 		= "noreply@thenfthood.com";
$cmessage 	= "Best Regards<br/> <i>The Nft Hood</i>";

$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;


$body = "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for signing up.;</p>";
$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to recover your password</b></a></p>
<br/>";
$send = mail($to, $subject, $body, $headers);
}



/** RESET PASSWORD **/
if(isset($_POST['fpassword']) && isset($_POST['cfpassword']) && isset($_POST['mail'])) {

	$fpassword = md5($_POST['fpassword']);
        $mail = $_POST['mail'];

	$sql = "UPDATE users SET `password` = '$fpassword', `activator` = '' WHERE `email` = '$mail'";
	$rsl = query($sql);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./updated"</script>';
}
?> 