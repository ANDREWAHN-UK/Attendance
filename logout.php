<?php 
include_once 'includes/session.php' //this needs to be included in order to identify the session to be destroyed
?>
<?php
session_destroy(); //destroy session
header('Location:index.php'); //redirect user
?>