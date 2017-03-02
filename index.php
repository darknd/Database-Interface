<?php

interface Database{
        function create($field, $value, $table);
        function read($data = array(), $table);
        function update($data = array(), $table);
        function delete($data = array(), $table);
}

class mySQL implements Database{

        public $ddbb;

        function __construct($host, $user, $pass, $ddbb) {
          try {
            $this->ddbb = mysqli_connect($host, $user, $pass, $ddbb);
          } catch(Exception $e) {
              echo 'Message: ' .$e->getMessage();
            }
        }

        function create($field, $value, $table){
            echo 'INSERT';
        }

        function read($data = array(), $table){
          echo 'SELECT';
        }
        function update($data = array(), $table){
          echo 'UPDATE';
        }
        function delete($data = array(), $table){
          echo 'DROP';
        }
}

$pdo = new mySQL('localhost','root','','darknd');
$pdo->create('field','value','table');
