 <?php

// this is development/local connection stuff
    // $host = 'localhost';
    // $db = 'attendance_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';  

    // Below for remote database stuff, i.e. connecting to a non local database

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
    $crud = new crud($pdo);

 ?>