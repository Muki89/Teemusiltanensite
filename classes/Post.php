<?php 
class Post{

	var $post;

	function __construct($post_id, $db_con){
		$db_con->query("SELECT * FROM `Posts` WHERE `id` = '$post_id'");
		$this->post = $db_con->single();
	}

	function getPostTitle(){
		return $this->post["title"];
	}

	function getBloggerId(){
		return $this->post["blogger_id"];
	}

	function getCreatedAtTime(){
		return $this->post["created_at"];
	}

	function getBodyContent(){
		return $this->post["body"];
	}



	public static function store($db_con){
		
		date_default_timezone_set('Europe/Helsinki');
		$title = $_POST['title'];
		$body = $_POST['content'];
		$blogger_id = $_SESSION['blogger']->blogger_id;
		$blog_id = $_SESSION['blogger']->blog_id;

		try{
			$db_con->beginTransaction();

			$db_con->query('INSERT INTO `Posts` (blog_id, blogger_id, title, body) 
				VALUES (:blogid, :bloggerid, :title, :body)');

			$db_con->bind(':blogid', $blog_id);
			$db_con->bind(':bloggerid', $blogger_id);
			$db_con->bind(':title', $title);
			$db_con->bind(':body', $body);

			$db_con->execute();

			$db_con->endTransaction();

		}

		catch(PDOException $e)
		{
			$database->cancelTransaction();
			echo "Storing post failed! Reason: " . $e;
			
		}

	}


	public static function getPostsByBloggerId($blogger_id){

		$database = new Database();

		$database->query('SELECT * FROM `Posts` WHERE `blogger_id` = :bloggerid');

		$database->bind(':bloggerid', $blogger_id);

		return $database->resultset();
	}

	function is_title(){
		echo $conn;
		return $this->title;
	}


}



?>