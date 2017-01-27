<?php
	function register($conn){
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$uemail = $_POST['uemail'];
		$new_password = password_hash($pword, PASSWORD_DEFAULT);

		try{
		   	if(checkNewUserInformation($uname, $pword, $uemail) && !checkIfUsernameOrEmailExist($conn, $uname, $uemail)){
			   	$stmt = $conn->prepare("INSERT INTO User (username, password, email) VALUES (?, ?, ?)");
			   	$stmt->bindparam(1,$uname);
			   	$stmt->bindparam(2,$new_password);
			   	$stmt->bindparam(3,$uemail);

			   	$stmt->execute();
			   	$conn = null;
			   	echo "<script type=\"text/javascript\">location='/views/login/login.php?registered=true'</script>";
				exit();
		   	} else{
		   		echo $user_error . $pass_error . $email_error . $same_name_email_error;
		   	}

	   }
	   catch(PDOException $e){
	   		echo $e->getMessage();
	   }
	}

	function login($conn){	
		global $error;

		$uname = $_POST["uname"];
		$upass = $_POST["pword"];

		// CHECK HASHED PASSWORD FOR USERS
		$pas_check = $conn->prepare("SELECT password FROM User where `username` = '$uname' or `email` = '$uname'");
		$pas_check->execute();
		$hashed_password = $pas_check->fetchAll();
		$passw = $hashed_password[0]['password'];

		try{
			if(password_verify($upass, $passw)){
				$stmt = $conn->prepare("SELECT COUNT(*) FROM User where `username` = '$uname' and `password` = '$passw'");
				$stmt->execute();
				$count = $stmt->fetchColumn();
				if($count >= 1){
					session_start();
					$_SESSION["user_session"] = $uname;
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


		// CHECK HASHED PASSWORD FOR BLOGGERS
		$pas_check = $conn->prepare("SELECT password FROM Bloggers where `bloggername` = '$uname' or `email` = '$uname'");
		$pas_check->execute();
		$hashed_password = $pas_check->fetchAll();
		$passw = $hashed_password[0]['password'];

		try{
			if(password_verify($upass, $passw)){
				$stmt = null;
				$stmt = $conn->prepare("SELECT COUNT(*) FROM Bloggers where `bloggername` = '$uname' OR `email` = '$uname' and `password` = '$passw'");
				$stmt->execute();
				$count = $stmt->fetchColumn();
				if($count >= 1){
					session_start();
					$_SESSION["blogger_session"] = $uname;
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
		if(ltrim($uname) != $uname){
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

		if(ltrim($upass) != $upass){
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
?>