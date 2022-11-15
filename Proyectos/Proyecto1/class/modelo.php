<?php
    require_once('config.php');
    class modeloCredencialesBD{
        protected $_db;
        public function __construct(){
            $this->_db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if($this->_db->connect_errno){
                echo "Failed to connect DB... ".$this->db->connect_errno;
                return;
            }
        }
    }
?>