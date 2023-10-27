<?php 

try {
    class Database
    {
        public $conn;
        public function __construct(){
            $this->conn = mysqli_connect('localhost', 'S_12$M-83', 'J5oM2kLBrNL1wGwk', 'Computer_IA');
        }
    
    
    }
} catch (Exception $e) {
    $err = $e->getMessage();
    echo $err;}


    try {
        class OtherActions extends Database{
            public function view($table){
                $sql = "SELECT * FROM ".$table." ";
                $result = $this->conn->query($sql);
                $list = array();
                while ($data = $result->fetch_array()){
                    $list[] = $data; 
                }
                return $list;
            }
        
            public function edit($table, $where){
                $condition = "";
                $list = array();
                foreach ($where as $key => $value) {
                    $condition .= $key. " = '" .$value. "' AND"; 
                }
                $condition = substr($condition, 0,-5);
                $sql = "SELECT * FROM ".$table." WHERE ".$condition." ";
                $result = $this->conn->query($sql);
                while ($row = $result->fetch_array()){
                    $list[] = $row;
                }
                return $list;
        
            }
        }
            } catch (Exception $e) {
        $err = $e->getMessage();
        echo $err;
    }
