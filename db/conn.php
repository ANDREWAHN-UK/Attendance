 <?php

// this is development/local connection stuff
    // $host = 'localhost';
    // $db = 'attendance_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';  

    // // Below for remote database stuff, i.e. connecting to a non local database.
    //  Remember, when making changes to one database, to duplicate the change in the other database

    $host = 'remotemysql.com';
    $db = '1zFOJFQPiN';
    $user = '1zFOJFQPiN';
    $pass = '4MKeLecHpr';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host; dbname=$db;charset=$charset";

    try
    {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e)
    {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';

    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin", "password");//<-- this is here so that every time the conn file gets loaded (i.e. on every page) the admin gets created at least once

 ?>