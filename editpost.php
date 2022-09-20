<?php
require_once 'db/conn.php';
//get values from post operation

if(isset($_POST['registerButton']))
    {
        //extract values from the $_POST array
        $id =$_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dateOfBirth'];
        $email = $_POST['inputEmail'];
        $contact = $_POST['contactNumber'];
        $specialty = $_POST['specialty'];

        //call crud function

        $result = $crud->editAttendee($id,$firstName, $lastName, $dob, $email, $contact, $specialty);
        //redirect
        if($result) {
            header("Location: viewrecords.php");
        } else{
            include 'includes/errormessage.php';
        }
    } else {
        include 'includes/errormessage.php';
    }
?>