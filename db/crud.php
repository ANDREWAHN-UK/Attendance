<?php

class crud
{
    // private datebase object
    private $db;

    // constructor to initialise private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAttendees($firstName, $lastName, $dob, $email, $contact, $specialty) //this function inserts entries into the database
    {
        try {
            $sql = "INSERT INTO attendee (firstName, lastName, dateOfBirth, emailAddress, contactNumber, specialty)
            VALUES (:firstName,:lastName, :dob, :email, :contact, :specialty)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':firstName', $firstName);
            $stmt->bindparam(':lastName', $lastName);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id, $firstName, $lastName, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstName`=:firstName,
                `lastName`=:lastName,
                `dateOfBirth`=:dob,
                `emailAddress`=:email,
                `contactNumber`=:contact,
                `specialty`=:specialty
                 WHERE attendee_id = :id ";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':firstName', $firstName);
            $stmt->bindparam(':lastName', $lastName);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        $sql = "SELECT * FROM `attendee`  inner join specialties  on specialty= specialty_id ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getAttendeeDetails($id)
    {
        $sql = "SELECT * FROM `attendee` inner join specialties  on specialty= specialty_id where attendee_id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getSpecialties()
    {
        $sql = "SELECT * FROM `specialties` ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
