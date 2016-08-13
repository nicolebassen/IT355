<?php
    
    /**
     * Nicole Bassen
     * Database class
     * MySQLi database; only one connection is allowed
     * OOP II - IT 355
     */
    
    class Database {
        private $_connection;
        // store the single instance
        private static $_instance;
        
        /**
         *get an instance of the database
         *@return Database
         */
        public static function getInstance() {
            if (!self::$_instance) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        /**
         *constructor
         */
        public function __construct() {
            $this->_connection = new mysqli('localhost', 'nbassen_user', 'DB_p@ssword', 'nbassen_grcc');
            // error handling
            if (mysqli_connect_error()) {
                trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
            }
        }
        
        /**
         *empty clone magic method to prevent duplication
         */
        private function __clone() {}
        
        /**
         *get the MySQLi connection
         */
        public function getConnection() {
            return $this->_connection;
        }
    }
    
?>