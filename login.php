<?php
$title = 'User Login ';

require_once 'includes/header.php';
require_once 'db/conn.php';

//if data submitted via form post request...
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //is it a post? if so, then ...
    $username = strtolower(trim($_POST['username'])); //check name
    $password = $_POST['password']; //check password
    $new_password = md5($password.$username); //hash password--> this is a security measure

    $result = $user->getUser($username,$new_password);//then call user object
    if(!$result){ //if there is no result, i.e. no matching name/password...
        echo'<div class ="alert alert-danger"> User name or password is incorrect, please try again.</div>';
    } else {
        $_SESSION['username'] = $username;//this creates a session with the now verified user name
        $_SESSION['id'] = $result['id'];
        header("Location:viewrecords.php");//redirect the user after they log in
    }
}

?>

<h1 class="text-center">
    <?php echo $title ?>
</h1>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<div class="mb-3 form-field">
    <table class="table table-sm">
        <tr>
            <td>
                <label for="username">Username: </label>
            </td>
            <td>
                <input type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                echo $_POST['username']; ?>">

                <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'> $username_error</p>"; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="username">Password: </label>
            </td>
            <td>
                <input type="password" name="password" id="password" class="form-control">
                <?php if (empty($password) && isset($password_error)) echo "<p class='text-danger'> $password_error</p>";  ?>
            </td>
        </tr>

    </table>
    <br>
    <br>
</div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" value="login" class=" btn btn-primary btn-block"> <br>
        <a href="#"> Forgot Password?</a>

    </div>
</form>

<?php include_once 'includes/footer.php' ?>