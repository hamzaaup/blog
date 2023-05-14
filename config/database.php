<?php
// Main config class for DB transactions
class Config {
    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "blog";
    private $connection;

    public function __construct() {
        $this->connection = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);       
        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    protected function connection() {
        return $this->connection;
    }

    protected function insert($email, $password) {
        $query = "INSERT INTO users (email,password) VALUES ('".$email."', '".$password."')";
        $this->connection->query($query);
        return $this->connection->insert_id;
    }

    protected function select($column, $table, $where=''){
        $select = "SELECT ".$column." FROM ".$table." ";
        if (!empty($where)) {
            $select.= " WHERE " .  $where ;
        }
        $result = $this->connection->query($select);
        $row = $result->fetch_assoc();
        return $row;
         
    }

    protected function selectAll($column, $table, $where=''){
        $select = "SELECT ".$column." FROM ".$table." ";
        if (!empty($where)) {
            $select.= " WHERE " .  $where ;
        }
        $result = $this->connection->query($select);
        $all_rows = array();
          while ($row = $result->fetch_assoc()) {
             array_push($all_rows, $row);
          }
          return $all_rows;
         
    }

    protected function delete($table, $where)
    {
        $query = "DELETE FROM  " . $table . "  WHERE ".$where." ";
        $result = $this->connection->query($query);
        return $result;
    }

    protected function RunQuery($query) {
        $status = $this->connection->query($query);
        if ($status) {
        	return 'success';
        } else {
        	return 'failed';
        }
    }

    public function __destruct() {
        $this->connection->close();
    }
}