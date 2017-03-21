<?php


	class Blogger{

		var $blogger;

		function __construct($blogger_id, $db_con){
			$db_con->query("SELECT * FROM `Bloggers` WHERE `blogger_id` = '$blogger_id'");
			$this->blogger = $db_con->single();

		}

		function getBloggerId(){
			return $this->blogger['blogger_id'];
		}

		function getBloggerName(){
			return $this->blogger['bloggername'];
		}

		function getBloggerEmail(){
			return $this->blogger['email'];
		}


		function writePost($post){
			
		}


	}


?>