<?php
    class db
    {
        //properties
        private $dbhost = 'localhost';
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "test";

        public function connect()
        {
            // Create a connection
            $conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

            return $conn;
        }
    }