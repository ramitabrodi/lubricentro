<?php
class Database {
    private $host = "localhost";
<<<<<<< HEAD
    private $port = "3307";
=======
>>>>>>> 0e30cedfb2c0af2541cda517b60237f5e50d940c
    private $db_name = "lubricentro_r18";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
<<<<<<< HEAD
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4",
=======
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
>>>>>>> 0e30cedfb2c0af2541cda517b60237f5e50d940c
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 0e30cedfb2c0af2541cda517b60237f5e50d940c
