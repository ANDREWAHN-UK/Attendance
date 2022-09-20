<?php
$title ='View Records';
require_once 'includes/header.php';
require_once 'db/conn.php'; //this needs to connect to conn, not crud.php. Be careful. Crud is created when conn is established.

$results = $crud->getAttendees();

?>


<table class="table">
    <thead>
    <tr>
        <!-- In this first tr tag, place your coloum headers -->
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Specialty</th>
        
        <th scope="col">Actions</th>
    </tr>
    <?php //1st php loop open
    // write a loop here to go through the database entries

    while($r = $results->fetch(PDO::FETCH_ASSOC)){

        //1st php loop closes here--> ?> 

      <!-- this is where the table rows are inserted
        inside each td, need a php tag to echo the required info
        Make sure the below td match the above th -->

        <tr>
            <td><?php  echo $r['attendee_id']?> </td>
            <td><?php  echo $r['firstName']?></td>
            <td><?php  echo $r['lastName']?></td>
            <td><?php  echo $r['name']?></td>

            <td>
                <a href="view.php?id=<?php  echo $r['attendee_id']?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php  echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php  echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
            </td>
            
        </tr>

        <?php  //2nd php loop opens
                }         // this curly brace closes the while loop, started in another php tag
       //2nd php loop closes ?>
   

    
</thead>
</table>
<br>
<br>
<br>


<?php 
require_once 'includes/footer.php';
?>