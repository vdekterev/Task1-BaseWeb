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
     * Register User
     * @param array $userdata
     * @return bool
     */
    public function userRegister(array $userdata): bool
    {
        $this->db->query('INSERT INTO users (email, password) VALUES(:email, :password)');
        $this->db->bind(':email', $userdata['email']);
        $this->db->bind(':password', $userdata['password']);

        return $this->db->execute();
    }

    /**
     * Login User
     * @param string $email
     * @param string $password
     * @return false|object
     */
    public function userLogin(string $email, string $password): false|object
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $user = $this->db->getSingleRecord();
        if (!$user) {
            return false;
        }
        $hashedPassword = $user->password;
        if (password_verify($password, $hashedPassword)){
            return $user;
        }
        return false;
    }
    /**
     * Checks if users exists by email
     * @param string $email
     * @return object|bool
     */
    public function userExists(string $email): object|bool
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->getSingleRecord();
    }
}