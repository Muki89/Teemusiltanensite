<?php
	function newBlog($conn){

		
		if(isset($_SESSION["blogger_id"])){
			date_default_timezone_set('Europe/Helsinki');
			$current_date = date("Y-m-d H:i:s");
			try{
				$new_blog = $conn->prepare("INSERT INTO Blogs (blogger_id, date, title, content) 
					VALUES (?, ?, ?, ?)");
				$new_blog->bindParam(1, $_SESSION["blogger_id"]);
				$new_blog->bindParam(2, $current_date);
				$new_blog->bindParam(3, $_POST['title']);
				$blog_content = trim($_POST['content']);
				$new_blog->bindParam(4, $blog_content);
				$new_blog->execute();
				$_SESSION["new_blog_id"] = $conn->lastInsertId();
				$conn = null;
				$new_blog = null;
			   	echo "<script type=\"text/javascript\">location='/views/blog/blog.php'</script>";
				exit();
			}catch(PDOException $e){
				echo $e->getMessage();
			}

		} else{
			echo "<script type=\"text/javascript\">location='/views/login/new_user.php'</script>";
		}
	}


	// function showBlog($conn){
	// 	if(isset($_SESSION['new_blog_id'])){
	// 		$id = $_SESSION['new_blog_id'];
	// 		try{
	// 			$get_blog = $conn->prepare("SELECT * FROM Blogs WHERE blog_id = '$id'");
	// 			$get_blog->execute();
	// 			$blog = $get_blog->fetchAll();
	// 			$_SESSION['selected_blog_title'] = $blog[0]['title'];
	// 			$_SESSION['selected_blog_content'] = $blog[0]['content'];
	// 			$_SESSION['selected_blog_date'] = $blog[0]['date'];
	// 			$_SESSION['selected_blog_blogger'] = $blog[0]['blogger_id'];
	// 		}catch(PDOException $e){	
	// 			echo $e->getMessage();
	// 		}
	// 	}
	// }

	// function showBlogs($conn){
		
	// }

	// function searchBlog(){
		
	// }

?>
