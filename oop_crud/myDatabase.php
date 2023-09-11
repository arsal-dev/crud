<?php

class myDatabase
{
    public $conn = '';

    function __construct($host, $username, $password, $db_name)
    {
        $this->conn = new mysqli($host, $username, $password, $db_name);

        if ($this->conn->connect_error) {
            return $this->conn->connect_error;
        }
    }

    function create($table, $name, $email, $password)
    {
        $sql = "INSERT INTO $table (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function read($table, $id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM $table WHERE id = $id";
        } else {
            $sql = "SELECT * FROM $table";
        }

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function update()
    {
    }

    function delete()
    {
    }

    function __destruct()
    {
        $this->conn->close();
    }
}


$myObj = new myDatabase('localhost', 'root', '', 'oop_crud');

echo $myObj->create('users', 'name', 'email@email.com', 12345678);
