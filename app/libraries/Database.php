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
    private PDOStatement $stmt; // Statement
    private string $error;

    public function __construct()
    {
        // Set DSN (Data Source Name)
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = array(
            PDO::ATTR_PERSISTENT => true, // checking if connection already established
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare Query
    public function query(string $sql): void
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind Value
    public function bind(string $param, mixed $value, int|null $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the statement
    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    // Get result as an array of objects
    public function getResult(): array
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as an object
    public function getSingleRecord(): object
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function getRowCount(): int
    {
        return $this->stmt->rowCount();
    }
}