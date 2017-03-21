<?php

	class Blog{

		var $blog;


		function __construct($id, $db_con){  
			$db_con->query('SELECT * FROM `Blogs` WHERE blog_id = ' . $id .'');
			$this->blog = $db_con->single();
		}

		function getBlogname(){  
			return $this->blog['blogname'];
		}

		function getBlogId(){
			return $this->blog['blog_id'];
		}

		function getBloggerId(){
			return $this->blog['blogger_id'];
		}

		function getCreationTime(){
			return $this->blog['created_at'];
		}

		function getUpdatedTime(){
			return $this->blog['updated_at'];
		}

	}

?>