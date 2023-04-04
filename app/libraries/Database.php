<?php

/*
 * PDO Database Class
 */

class Database
{
    // credentials
    private string $host = DB_HOST;
    private string $username = DB_USERNAME;
    private string $password = DB_PASSWORD;
    private string $dbname = DB_NAME;

    private $dbh; // Database Handler
    private $stmt; // Statement
    private $error;

    public function __construct()
    {
        // Setting DSN (Data Source Name)
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = array(
            PDO::ATTR_PERSISTENT => true, // checking if connection already established
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
        // Creating PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }

    }
}