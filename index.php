<?php
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 


$pageName = 'Etusivu';
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/jumbotron.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/etusivu.php"); ?>
</body>

</html>