<?php

interface Database{
        function create($field, $value, $table);
        function read($field=null, $value=null, $table);
        function update($field, $value, $table);
        function delete($field, $value, $table);
}

class mySQL implements Database{
        private $db;
    /**
     * mySQL constructor.
     * @param $host
     * @param $user
     * @param $pass
     * @param $ddbb
     */
    function __construct($host, $user, $pass, $db) {
          try {
            $this->db = mysqli_connect($host, $user, $pass, $db);
          } catch(Exception $e) {
              echo 'Message: ' .$e->getMessage();
            }
        }

        function create($field, $value, $table){
          $sql = "INSERT INTO $table".
                 "($field) ".
                 "VALUES ".
                "('$value')";
          if($query = mysqli_query($this->db, $sql))
            echo 'Operation INSERT, OK.';
          else {
              echo $this->ddbb->error;
            }
        }

        function read($field=null, $value=null, $table){
          if (($field == null) && ($value == null)){
            $sql = "SELECT * FROM $table";
            if($query = mysqli_query($this->db, $sql)){
              echo "Operation SELECT, OK <br>";
              $row = mysqli_fetch_array($query);
              print_r($row);
            }else {
              echo $this->db->error;
            }
          }

          if ($value == null){
            $sql = "SELECT $field FROM $table";
            if($query = mysqli_query($this->db, $sql)){
              echo "Operation SELECT, OK <br>";
              $row = mysqli_fetch_array($query);
              print_r($row);
            }else {
              echo $this->ddbb->error;
            }
        }

        }
        function update($field, $value, $table){
          echo 'UPDATE';
        }
        function delete($field, $value, $table){
          echo 'DROP';
        }
}

$pdo = new mySQL('localhost','root','','darknd');
//$pdo->create('text','Im a text','data');
//$pdo->read(null,null,'data');
$pdo->read('text',null,'data');
