
            <!-- 
                $servername = 'db'; 
                $username = 'serviceMan';
                $password = 'pwd';
                $dbname = 'camagru_db';
                $connection = new mysqli($servername, $username, $password, $dbname)

                if($connection->connect_error) {
                die(' 😔 Connection Failed: 🤷‍♂️ ', $connection->connect_error);
                }
                echo ' ♻️ Connected Successfully ! 🫵🏼'; 
            -->


<?php
    class Database {
        private $host = 'db';
        private $db_name = 'camagru_db';
        private $username = 'serviceMan';
        private $password = 'pwd';
        private $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }
?>
