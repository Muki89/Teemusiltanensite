<?php
	function register($conn){

	}

	function login($conn){	
		global $error;

		$uname = $_POST["uname"];
		$upass = $_POST["pword"];

		// CHECK HASHED PASSWORD FOR USERS
		$pas_check = $conn->prepare("SELECT password FROM User where `username` = '$uname' or `email` = '$uname'");
		$pas_check->execute();
		$hashed_password = $pas_check->fetchAll();
		if(!empty($hashed_password)){
			$passw = $hashed_password[0]['password'];
		
			try{
				if(password_verify($upass, $passw)){
					$stmt = $conn->prepare("SELECT COUNT(*) FROM User where `username` = '$uname' and `password` = '$passw'");
					$stmt->execute();
					$count = $stmt->fetchColumn();
					if($count >= 1){
						$user_info = saveUserSessionInfo($conn, $uname, $passw);
						$_SESSION["user_id"] = $user_info['id'];
						$_SESSION["username"] = $user_info['username'];
						$_SESSION["user_password"] = $user_info['password'];
						$_SESSION["user_email"] = $user_info['email'];
						$conn = null;
						$stmt = null;
						echo "<script type=\"text/javascript\">location='/index.php?login=true'</script>";
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
		$pas_check = $conn->prepare("SELECT password FROM Bloggers where `bloggername` = '$uname' or `email` = '$uname'");
		$pas_check->execute();
		$hashed_password = $pas_check->fetchAll();

		if(!empty($hashed_password)){

			$passw = $hashed_password[0]['password'];

			try{
				if(password_verify($upass, $passw)){
					$stmt = null;
					$stmt = $conn->prepare("SELECT COUNT(*) FROM Bloggers where `bloggername` = '$uname' OR `email` = '$uname' and `password` = '$passw'");
					$stmt->execute();
					$count = $stmt->fetchColumn();
					if($count >= 1){
						$blogger_info = saveBloggerSessionInfo($conn, $uname, $passw);
						$_SESSION["blogger_id"] = $blogger_info['blogger_id'];
						$_SESSION["bloggername"] = $blogger_info['bloggername'];
						$_SESSION["blogger_password"] = $blogger_info['password'];
						$_SESSION["blogger_email"] = $blogger_info['email'];
						$conn = null;
						$stmt = null;
						echo "<script type=\"text/javascript\">location='/index.php?login=true'</script>";
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


	function checkNewUserInformation($uname, $upass, $uemail){ //returns true if everything is correct.
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

	function checkIfUsernameOrEmailExist($conn, $uname, $uemail){ // returns true if already exists
		global $same_name_email_error;
		try{
			$user_db_check = $conn->prepare("SELECT COUNT(*) FROM User WHERE `username` = '$uname' or `email` = '$uemail'");
			$user_db_check->execute();
			$count = $user_db_check->fetchColumn();
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

	function saveUserSessionInfo($conn, $uname, $upass){
		try{
			$get_user = $conn->prepare("SELECT id, username, email, password FROM User where `username` = '$uname'  or `email` = '$uname' and password = '$upass'");
			$get_user->execute();
			$info = $get_user->fetchAll();
			return $info[0];
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function saveBloggerSessionInfo($conn, $uname, $upass){
		try{
			$get_blogger = $conn->prepare("SELECT blogger_id, bloggername, password, email FROM Bloggers where `bloggername` = '$uname'  or `email` = '$uname' and password = '$upass'");
			$get_blogger->execute();
			$info = $get_blogger->fetchAll();
			return $info[0];
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>