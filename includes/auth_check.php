<?php 

if(!isset($_SESSION['username'])){//nb in the video this is userid, but username is needed in this set of code, else it does not work
    header("Location: login.php");
}

?>