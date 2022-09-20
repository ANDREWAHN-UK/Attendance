<?php
$title = 'View Details';
require_once 'includes/header.php';
require_once 'db/conn.php'; //this needs to connect to conn, not crud.php. Be careful. Crud is created when conn is established.

//get attendee by id

if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>

    <div class="card" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title"> <?php echo $result['firstName'] . ' ' . $result['lastName']; ?></h5>
            <h6 class="card-subtitle"><?php echo $result['name']; ?></h6>
            <p class="card-text">DOB: <?php echo $result['dateOfBirth']; ?></p>
            <p class="card-text">Email: <?php echo $result['emailAddress']; ?></p>
            <p class="card-text">Tel: <?php echo $result['contactNumber']; ?></p>
            <a href="index.php" class="btn btn-info">Home</a>
            <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" 
            href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
        </div>

    </div>


<?php } ?>

<?php
require_once 'includes/footer.php';
?>