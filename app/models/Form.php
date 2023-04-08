<?php

class Form
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createForm(array $formdata): bool
    {
        return true;
    }

    public function getForm(): bool
    {
        //
        return true;
    }

    public function updateForm(): bool
    {
        //
        return true;
    }

    public function deleteForm(): bool
    {
        //
        return true;
    }
}