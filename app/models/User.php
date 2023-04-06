<?php

/**
 * User Model
 */
class User
{
    /**
     * @var Database
     */
    private Database $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Checks if users exists by email
     * @param string $email
     * @return object
     *
     */
    public function userExists(string $email): object | bool
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->getSingleRecord();
        return $row;
    }
}