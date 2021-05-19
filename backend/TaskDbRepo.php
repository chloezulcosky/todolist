<?php
class taskDbRepo
{
    private $host = "localhost";
    private $username = "root";
    private $password = "Fastbird$16";
    private $database = "list";
    public $connection;

    public function getConnection() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        mysqli_select_db($this->connection, $this->database);
        return $this->connection;
    }

    public function selectTable(): array {
        $query = "SELECT taskID, taskDescription, taskName, status FROM task";
        $result = mysqli_query($this->getConnection(), $query);
        $rows = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function deleteTaskQuery($id) {
        $query = "DELETE FROM task WHERE taskID = $id";
        mysqli_query($this->getConnection(), $query);
        http_response_code(204);

    }

    public function getCurrentStatus($id) {
        $query = "SELECT status FROM task WHERE taskID = $id";
        $result = mysqli_query($this->getConnection(), $query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['status'];
    }

    public function updateTask($id, $updatedStatus) {
        $query = "UPDATE task SET status = '" . $updatedStatus . "' WHERE taskID = $id";
        mysqli_query($this->getConnection(), $query);
    }

    public function addTask($name, $description) {
        $query = "INSERT INTO task (taskName, taskDescription, status) VALUES ('" . $name . "','" . $description . "', 'Incomplete')";
        mysqli_query($this->getConnection(), $query);
    }
}


?>