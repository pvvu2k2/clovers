<?php

class DataBaseModel
{
    private $dbhost = "localhost";
    private $dbname = "wd19301_clovers";
    private $dbuser = "root";
    private $dbpass = "123456";
    private $conn;
    private $stmt;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=utf8mb4", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function query($sql, $params = null)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt;
    }
    public function getAll($sql)
    {
        return $this->query($sql)->fetchAll();
    }
    public function getOne($sql)
    {
        return $this->query($sql)->fetch();
    }
    public function insert($sql, $params = [])
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($params);
        return $this->conn->lastInsertId();
    }
    public function del($sql, $params = [])
    {
        $this->query($sql, $params);
    }

    public function __destruct()
    {
        unset($this->conn);
    }
}
