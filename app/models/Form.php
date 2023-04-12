<?php

/**
 *Form Model
 */
class Form
{
    /**
     * Database Instance
     * @var Database
     */
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Create Method
     * @param array $formdata
     * @return bool
     */
    public function createForm(array $formdata): bool
    {
        $this->db->query('INSERT INTO forms (user_id, name, experience, os, learn, about) 
                          VALUES(:user_id, :name, :experience, :os, :learn, :about)');
        $this->db->bind(':user_id', $formdata['user_id']);
        $this->db->bind(':name', $formdata['name']);
        $this->db->bind(':experience', $formdata['experience']);
        $this->db->bind(':os', $formdata['os']);
        $this->db->bind(':learn', $formdata['learn']);
        $this->db->bind(':about', $formdata['about']);
        return $this->db->execute();
    }

    /**
     * Read Method
     * @return false|object
     */
    public function getForm(): false|object
    {
        $this->db->query('SELECT * FROM forms WHERE user_id = :user_id');
        $this->db->bind(':user_id', $_SESSION['user_id']);
        return $this->db->getSingleRecord();
    }

    /**
     * Update Method
     * @return bool
     */
    public function updateForm(): bool
    {
        //
        return true;
    }

    /**
     * Delete Method
     * @param $user_id
     * @return bool
     */
    public function deleteForm($user_id): bool
    {
        $this->db->query('DELETE FROM forms WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->execute();
    }
}