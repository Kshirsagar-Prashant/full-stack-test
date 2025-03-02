<?php
class Database {
    private $host = 'localhost';
    private $dbname;
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct($dbname) {
        $this->dbname = $dbname;
        $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function fetchAllData() {
        $sql = "SELECT * FROM Sections Where Status=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetchSections() {
        $sql = "SELECT DISTINCT Section_Name FROM Sections Where Status=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetchimg($name) {
        $sql = "SELECT Section_Icon FROM Sections Where Status=0 AND Section_Name='$name'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     public function fetchAllDataS($cnd) {

        $sql = "SELECT * FROM Sections Where Status=0 AND Section_Name='$cnd'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>