<?php

$title ='Success';
require_once 'includes/header.php';
require_once 'db/conn.php'; //this needs to connect to conn, not crud.php. Be careful. Crud is created when conn is established.
require_once 'sendemail.php';

if(isset($_POST['registerButton']))
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dateOfBirth'];
        $email = $_POST['inputEmail'];
        $contact = $_POST['contactNumber'];
        $specialty = $_POST['specialty'];

        $isSuccess = $crud->insertAttendees($firstName, $lastName, $dob, $email, $contact, $specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess){
            SendEmail::SendMail($email, 'Welcome to the IT Conference', 'Thankyou for registering!');
            include 'includes/successmessage.php';
        } else {
            include 'includes/errormessage.php';
        }
    }
?>
    <div class="card" style="width: 18rem;">
    
        <div class="card-body">
            <h5 class="card-title"> <?php echo $_POST['firstName'].' '.$_POST['lastName'];?></h5>
            <h6 class="card-subtitle"><?php echo $specialtyName['name']; ?></h6>
            <p class="card-text">DOB: <?php echo $_POST['dateOfBirth'];?></p>
            <p class="card-text">Email: <?php echo $_POST['inputEmail'];?></p>
            <p class="card-text">Tel: <?php echo $_POST['contactNumber']; ?></p>
            <a href="index.php" class="btn btn-primary">Home</a>
        </div>
        
    </div>

<?php

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
require_once 'includes/footer.php';
?>