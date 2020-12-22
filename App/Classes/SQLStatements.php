<?php

  class SQLStatements{

    function __construct(){
      $this -> sql = '';
    }

    function SELECT($values){

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

    //function

    function all(){
      return $this -> sql;
    }

  }

?>
