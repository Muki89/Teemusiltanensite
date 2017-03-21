<?php
	
	class Xbubble{

		private $blogs;
		private $users;
		private $bloggers;
		private $posts;
		private $tables;
		var $blog;
		var $post;


		function __construct($db_con){
			
			$db_con->query('SHOW TABLES FROM `teemusiltanencom`');
			$this->tables = $db_con->resultset();
			
			// Set $this->tables table data to variables $blogs, $users, $bloggers, $posts from database teemusiltanencom

			for($i=0; $i<count($this->tables); $i++){
				$this->toWhitchVariable($i, $db_con);
			}

		}


		function getBlogs(){

			return $this->blogs;

		}

		public function getBlogById($id){

			for($i = 0; $i<count($this->blogs); $i++){
				if($this->blogs[$i]["blog_id"] == $id){
					$this->blog = $this->blogs[$i];
					return $this->blog;
				}
			}

		}


		function getUsers(){

			return $this->users;

		}


		function getBloggers(){

			return $this->bloggers;

		}


		function getPosts(){
			return $this->posts;

		}

		function getPostsByBlogId($blog_id){
			
			for($i = 0,  $posts_by_id = []; $i<count($this->posts); $i++){
				if($this->posts[$i]["blog_id"] == $blog_id){
					array_push($posts_by_id, $this->posts[$i]);
				}
			}
			return $posts_by_id;
		}

		function getNewestPost(){
			$newest_post;
			if(!empty($this->posts)){
				$newest_post = $this->posts[0];
				for($i=1; $i<count($this->posts); $i++){
					if(date($newest_post['created_at']) < date($this->posts[$i]['created_at'])){
						$newest_post = $this->posts[$i];
					}
				}
			}
			return $newest_post;
		}

		function getDatabaseTable($id){

			return $this->tables[$id]["Tables_in_teemusiltanencom"];

		}


		function setTableDataToVariable($table, $db_con){

			$db_con->query('SELECT * FROM ' . $table);
			return $db_con->resultset();

		}


		// choose to whitch variable to put the table data from $tables
		function toWhitchVariable($i, $db_con){

				switch ($i) {

					// BLOGGERS
					case '0':  

						$this->bloggers = $this->setTableDataToVariable($this->getDatabaseTable($i), $db_con);
						break;

					// BLOGS
					case '1': 

						$this->blogs = $this->setTableDataToVariable($this->getDatabaseTable($i), $db_con);
						break;

					// POSTS
					case '2': 

						$this->posts = $this->setTableDataToVariable($this->getDatabaseTable($i), $db_con);
						break;

					// USERS
					case '3': 

						$this->users = $this->setTableDataToVariable($this->getDatabaseTable($i), $db_con);
						break;

					// Break switch 
					default:
						break;
				}	
		}


	}




?>