<?php

  class SQLClass{

    function __construct(){
      $this -> sql = '';
    }

    function select($values){

      $table = [];
      $column = [];

      foreach ($values as $key => $array) {
        array_push($table, $key);
        foreach ($array as $value) {
          array_push($column, $value);
        }
      }

      $this -> sql .= 'SELECT ' . implode(', ', $column) . ' FROM ' . implode(', ', $table);
      return $this;

    }

    function from($tables){
      $this -> sql .= 'FROM ' . $tables;
      return $this;
    }

    function all(){
      return $this -> sql;
    }

  }

?>
