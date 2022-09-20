<?php 

    require_once 'db/conn.php';

    if(!$_GET['id']){
    include 'includes/errormessage.php';
    } else {
        $id = $_GET['id'];
    }

    //call delete function
$result = $crud->deleteAttendee($id);

    //redirect to list of attendees
    if($result)
    {
        header("Location: viewrecords.php");
    } else {
        include 'includes/errormessage.php';
    }

?>