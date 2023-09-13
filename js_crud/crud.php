<?php

class crud
{
    public $conn = '';

    function __construct($host, $username, $password, $db_name)
    {
        $this->conn = new mysqli($host, $username, $password, $db_name);

        if ($this->conn->connect_error) {
            return $this->conn->connect_error;
        }
    }

    function create($table, $params)
    {
        $params_keys = implode(", ", array_keys($params));

        $params_values = implode("', '", $params);

        $sql = "INSERT INTO $table ($params_keys) VALUES ('$params_values')";

        if ($this->conn->query($sql)) {
            return  ['status' => 200, 'result' => $this->conn->insert_id];
        } else {
            return false;
        }
    }

    function read($table, $id = false)
    {
        $sql = "SELECT * FROM $table";
        if ($id != false) {
            $sql .= " WHERE id = $id";
        }

        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function update($table, $params, $id)
    {
        $newArr = [];
        foreach ($params as $key => $value) {
            $newArr[] = "$key = '$value'";
        }

        $params_string = implode(', ', $newArr);

        $sql = "UPDATE $table SET $params_string WHERE id = $id";

        if ($this->conn->query($sql)) {
            return  'Data updated Successfuly Affected Row: ' . $this->conn->affected_rows;
        } else {
            return false;
        }
    }

    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";

        if ($this->conn->query($sql)) {
            return  'Data deleted Successfuly';
        } else {
            return false;
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }
}

$get = new crud('localhost', 'root', '', 'oop_crud');
