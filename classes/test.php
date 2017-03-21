<?php 

// include 'Post.php';

include 'database.class.php';
include 'Xbubble.php';
include 'Blog.php';
$db_con = new Database();
$xbubble = new Xbubble(new Database());


echo "<pre>";
echo "GET Newest Post: <br>";
print_r($xbubble->getNewestPost());
echo "</pre>";

// echo $blog->getBlogname() . '<br>';
// echo $blog->getBloggerId() . '<br>'; 
// echo $blog->getBlogId() . '<br>';
// echo $blog->getCreationTime() . '<br>';
// echo $blog->getUpdatedTime();


// echo "<pre>";
// echo "GET ALL Posts: <br>";
// print_r($xbubble->getPosts());
// echo "</pre>";



// echo "<pre>";
// echo "GET ALL bloggers: <br>";
// print_r($xbubble->getBloggers());
// echo "</pre>";

// echo "<pre>";
// echo "GET ALL Users: <br>";
// print_r($xbubble->getUsers());
// echo "</pre>";






?>