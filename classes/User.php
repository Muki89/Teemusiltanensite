<?php
session_start();
class User{

	public $user_id;
	public $username;
	public $user_password;
	public $user_email;

	public $blogger_id;
	public $blog_id;
	public $bloggername;
	public $blogger_password;
	public $blogger_email;

	private function __construct($user_info, $isBlogger){
		if(!$isBlogger){
			$this->user_id = $user_info['id'];
			$this->username = $user_info['username'];
			$this->user_password = $user_info['password'];
			$this->user_email = $user_info['email'];
		}
		if($isBlogger){
			$this->blogger_id = $user_info['blogger_id'];
			$this->blog_id = $user_info['blog_id'];
			$this->bloggername = $user_info['bloggername'];
			$this->blogger_password = $user_info['password'];
			$this->blogger_email = $user_info['email'];
		}

	}

	public static function register($db_con){
		global $user_error;
		global $pass_error;
		global $email_error;
		global $same_name_email_error;
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$uemail = $_POST['uemail'];
		$new_password = password_hash($pword, PASSWORD_DEFAULT);

		try{
		   	if(User::checkNewUserInformation($uname, $pword, $uemail) && !User::checkIfUsernameOrEmailExist($db_con, $uname, $uemail)){
			   	$db_con->query("INSERT INTO User (username, password, email) VALUES (?, ?, ?)");
			   	$db_con->bind(1,$uname);
			   	$db_con->bind(2,$new_password);
			   	$db_con->bind(3,$uemail);

			   	$db_con->execute();
			   	$db_con = null;
			   	echo "<script type=\"text/javascript\">location='/views/login/login.php?registered=true'</script>";
				exit();
		   	} 

	   }
	   catch(PDOException $e){
	   		echo $e->getMessage();
	   }
	}

	public static function login($db_con){
		global $error;

		$uname = $_POST["uname"];
		$upass = $_POST["pword"];
		// CHECK HASHED PASSWORD FOR USERS
		$db_con->query("SELECT password FROM User where `username` = '$uname' or `email` = '$uname'");
		$hashed_password = $db_con->resultset();
		if(!empty($hashed_password)){
			$passw = $hashed_password[0]['password'];

			try{
				if(password_verify($upass, $passw)){
					$db_con->query("SELECT COUNT(*) FROM User where `username` = '$uname' and `password` = '$passw'");
					$count = $db_con->single()["COUNT(*)"];
					echo $count;
					if($count >= 1){
						$user_info = User::saveUserSessionInfo($db_con, $uname, $upass);
						$user = new static($user_info, false);
						$_SESSION['user'] = $user;
						$db_con = null;
						echo "<script type=\"text/javascript\">location='/index.php'</script>";
						exit();
					}
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		// CHECK HASHED PASSWORD FOR BLOGGERS
		$db_con->query("SELECT password FROM Bloggers where `bloggername` = '$uname' or `email` = '$uname'");
		$hashed_password = $db_con->resultset();

		if(!empty($hashed_password)){

			$passw = $hashed_password[0]['password'];

			try{
				if(password_verify($upass, $passw)){
					$db_con->query("SELECT COUNT(*) FROM Bloggers where `bloggername` = '$uname' OR `email` = '$uname' and `password` = '$passw'");
					$count = $db_con->single()["COUNT(*)"];
					if($count >= 1){
						$blogger_info = User::saveBloggerSessionInfo($db_con, $uname, $passw);
						$blogger = new static($blogger_info,true);
						$_SESSION['blogger'] = $blogger;
						$db_con = null;
						echo "<script type=\"text/javascript\">location='/index.php'</script>";
						exit();
					} else{
						$error .= "Käyttäjätunnus tai salasana on virheellinen.";
					}

				} else{
					$error .= "Käyttäjätunnus tai salasana on virheellinen.";
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		} else{
			$error .= "Käyttäjätunnus tai salasana on virheellinen.";
		}
	}

	private static function checkNewUserInformation($uname, $upass, $uemail){ //returns true if everything is correct.
		global $user_error;
		global $pass_error;
		global $email_error;
		$boolean = true;

		if(empty($uname)){
			$user_error .= "Sinun tulee valita käyttäjätunnus.";
			$boolean = false;
		}
		if(strlen($uname)<4 || strlen($uname)>30){
			$user_error .= "Käyttäjätunnuksen pituuden tulee olla välillä 4-30 merkkiä.";
			$boolean = false;
		}
		if(trim($uname) != $uname){
			$user_error .= "Käyttäjätunnus ei saa sisältää välilyöntejä.";
			$boolean = false;
		}
		if(empty($upass)){
			$pass_error .= "Sinun tulee valita salasana. ";
			$boolean = false;
		}
		if(strlen($upass)<6 || strlen($upass)>60){
			$pass_error .= "Salasanan on oltava vähintään 6 merkkiä ja enintään 60 merkkiä.";
			$boolean = false;
		}

		if(trim($upass) != $upass){
			$pass_error .= "Salasana ei saa sisältää välilyöntejä.";
			$boolean = false;
		}
		if(empty($uemail)){
			$email_error .= "Sinun tulee valita sähköpostiosoite. ";
			$boolean = false;
		} 
		if(!filter_var($uemail, FILTER_VALIDATE_EMAIL)){
			$email_error .= "Syötä sähköpostiosoite muodossa: oikea@sahkoposti.muoto.";
			$boolean = false;
		}
		return $boolean;
	}

	private static function checkIfUsernameOrEmailExist($db_con, $uname, $uemail){ // returns true if already exists
		global $same_name_email_error;
		try{
			$db_con->query("SELECT COUNT(*) FROM User WHERE `username` = '$uname' or `email` = '$uemail'");
			$count = $db_con->single()["COUNT(*)"];
			if($count >= 1){
				$same_name_email_error .= "<br>Valitsemasi käyttäjätunnus tai sähköpostiosoite on jo käytössä.";
				return true;
			} else {
				return false;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}	

	private static function saveUserSessionInfo($conn, $uname, $upass){
		try{
			$conn->query("SELECT id, username, email, password FROM User where `username` = '$uname'  or `email` = '$uname' and password = '$upass'");
			$info = $conn->resultset();
			return $info[0];
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	private static function saveBloggerSessionInfo($conn, $uname, $upass){
		try{
			$conn->query("SELECT blogger_id, blog_id, bloggername, password, email FROM Bloggers where `bloggername` = '$uname'  or `email` = '$uname' and password = '$upass'");
			$info = $conn->resultset();
			return $info[0];
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

}

?>

