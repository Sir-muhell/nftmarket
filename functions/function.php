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

// $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Nft Hood</title></head><link rel='stylesheet' href='#'><body style='text-align: center;'>";
// $body .= "<section style='margin: 30px; margin-top: 50px ; background: #FE5F75; color: #000;'>";
// $body .= "<img style='margin-top: 35px; width: 280px; height: 105px;' src='{$logo}' alt='Logo'>";
// $body .= "<h1 style='margin-top: 45px; color: #ff0000'>Activate your email to continue</h1>
// <br/>";
$body = "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for signing up.;</p>";
// $body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>We've credited you free 5 PDFs Credit to get started.;</p>
// <br/>";
$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to activate your email Address</b></a></p>
<br/>";
// $body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
// $body .= "<p text-align: center;'><a href='https://dotpedia.com.ng/contact'><img src='https://dotpedia.com.ng/images/6.png'></a>";
// $body .= "<p style='text-align: center;'>Email.: <span style='color: #ff0000'>pdf@dotpedia.com.ng</span></p>";	
// $body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #ff0000'>+234(0) 810 317 1902</span></p>";	
// $body .= "<p style='text-align: center; padding-bottom: 50px;'>DotPedia from DotEightPlus</p>";	
// $body .= "<script src='https://dotpedia.com.ng/js/bootstrap.min.js'></script>";
// $body .= "</section>";	
// $body .= "</body></html>";
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
if(isset($_POST['fgeml'])) {
	
	$email  = clean(escape($_POST['fgeml']));

	if(!email_exist($email)) {

		echo "Sorry! This email doesn't exit";
		
	} else {

	$activator = token_generator();

	$ssl = "UPDATE signup SET `activator` = '$activator' WHERE `email` = '$email'";
	$rsl = query($ssl);

	//redirect to verify function
	$subj = "RESET YOUR PASSWORD";
	$link = "https://dotpedia.com.ng/./reset?vef=".$activator;

	$_SESSION['fgeml'] = $email;

	fgmail_mailer($email, $activator, $subj, $link);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./recover"</script>';

	}
}


/** FORGOT PASSWORD EMAIL **/
function fgmail_mailer($email, $activator, $subj, $link) {
	
$to 		= $email;
$from 		= "noreply@dotpedia.com.ng";
$cmessage 	= "Best Regards<br/> <i>Team DotPedia</i>";

$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = 'https://dotpedia.com.ng/images/cover.png';
$url  = 'https://dotpedia.com.ng';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotpedia.com.ng/css/bootstrap.min.css'><body style='text-align: center;'>";
$body .= "<section style='margin: 30px; margin-top: 50px ; background: #FFE9E6; color: #000;'>";
$body .= "<img style='margin-top: 35px; width: 280px; height: 105px;' src='{$logo}' alt='DotPedia'>";
$body .= "<h1 style='margin-top: 45px; color: #ff0000'>Recover Your Password</h1>
<br/>";
$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> You requested for a password reset</p><br/>";

$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #ff0000; text-decoration: none'><b>Click here to recover your password</b></a></p>
<br/>";
$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Kindly ignore this mail if this wasn't from you.</p>";	
$body .= "<p text-align: center;'><a href='https://dotpedia.com.ng/contact'><img src='https://dotpedia.com.ng/images/6.png'></a>";
$body .= "<p style='text-align: center;'>Email.: <span style='color: #ff0000'>pdf@dotpedia.com.ng</span></p>";	
$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #ff0000'>+234(0) 810 317 1902</span></p>";	
$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotPedia from DotEightPlus</p>";	
$body .= "<script src='https://dotpedia.com.ng/js/bootstrap.min.js'></script>";
$body .= "</section>";	
$body .= "</body></html>";
$send = mail($to, $subject, $body, $headers);
}



/** RESET PASSWORD **/
if(isset($_POST['fgpword']) && isset($_POST['fgcpword']) && isset($_POST['act'])) {

	$fgpword = md5($_POST['fgpword']);
        $eml = $_SESSION['fgeml'];

	$sql = "UPDATE signup SET `pword` = '$fgpword', `activator` = '' WHERE `email` = '$eml'";
	$rsl = query($sql);

	//redirect to verify page
	echo 'Loading...Please Wait!';
	echo '<script>window.location.href ="./updated"</script>';
}
?>