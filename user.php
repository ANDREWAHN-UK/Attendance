<?php 

class user{
        //private database object
        private $db;

        // constructor to initialise private variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username, $password){
            try {

                $result = $this->getUserByUsername($username); //call this function first, to check the database to see if the user already exists

                if($result['num'] > 0){
                    return false; //if a user is found, returns false
                } else {
                    $new_password = md5($password.$username);//<-- encrypting passsword
                    //if a user is not found, insert user
                    //define sql statement to be executed
                    $sql = "INSERT INTO users (username, password) VALUES ( :username, :password)"; //prepare statement for execution
                    $stmt = $this->db->prepare($sql);

                    //bind placeholders to the actual value (prevents injection attacks)
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                

                    $stmt->execute(); //execute the statement
                    return true; 
                }
               
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM users  where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        
        //the idea of the below function is to avoid duplicating user names
        public function getUserByUsername($username){
            try{
                $sql = "SELECT count(*) as num FROM users  where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
              
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
}
