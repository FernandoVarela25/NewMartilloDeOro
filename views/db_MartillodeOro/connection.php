<?php
    class Database{
        private $host;
        private $dbname;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->host     = 'localhost';
            $this->dbname   = 'martillodeoro';
            $this->user     = 'Karla';
            $this->password = "12345678";
            $this->charset  = 'utf8mb4';
        }

        function connect(){    
            try{
                $conn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($conn, $this->user, $this->password, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection: ' . $e->getMessage());
            }   
        }
    }
?>