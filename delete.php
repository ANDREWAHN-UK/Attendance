<?php 
    require_once 'includes/auth_check.php'; //check if the person viewing this is logged in
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
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