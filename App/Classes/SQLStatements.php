<?php

  class SQLStatements{

    function __construct(){
      $this -> sql = '';
    }

    function DB_HOST($host){
      $this -> sql .= 'mysql:host=' . $host . ';charset=utf8mb4;';
      return $this;
    }

    function DB_NAME($name){
      $this -> sql .= 'dbname=' . $name;
      return $this;
    }

    function CONNECT($user, $pass){
      try {
        $db = new PDO($this -> sql, $user, $pass);
        $db -> exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");

        $this -> sql = '';

        return $db;

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }
    }

    function SELECT($values){

      $this -> sql = '';

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

    function WHERE($value){

      $this -> sql .= ' WHERE ' . $value . ' ';
      return $this;
    }

    function LIKE($column, $value, $logical = null){
      $this -> sql .= $column . ' LIKE ' . "'". $value ."' " . $logical . ' ';
      return $this;
    }

    function LIMIT($start, $end = null){
      $this -> sql .= trim(' LIMIT ' . $start . ',' . $end, ',');
      return $this;
    }

    function GROUP_BY($column){
      $this -> sql .= ' GROUP BY ' . $column;
      return $this;
    }

    function ORDER_BY($column, $sort = 'ASC'){
      $this -> sql .= ' ORDER BY ' . $column . ' ' . $sort;
      return $this;
    }

    function BETWEEN($start, $end, $is_not = null){
      $this -> sql .= ' ' . $is_not . ' BETWEEN ' . $start . ' AND ' . $end;
      return $this;
    }

    function INNER_JOIN($table){
      $this -> sql .= ' INNER JOIN ' . $table;
      return $this;
    }

    function LEFT_JOIN($table){
      $this -> sql .= ' LEFT JOIN ' . $table;
      return $this;
    }

    function RIGHT_JOIN($table){
      $this -> sql .= ' RIGHT JOIN ' . $table;
      return $this;
    }

    function ON($table1, $table2, $find = null){
      if(isset($find) && $find == 'FIND'){
        $this -> sql .= ' ON FIND_IN_SET(' . $table1 . ', ' . $table2 . ')';
      } else{
        $this -> sql .= ' ON ' . $table1 . ' = ' . $table2;
      }

      return $this;
    }

    function DELETE($table){
      $this -> sql = '';

      $this -> sql .= 'DELETE FROM ' . $table;
      return $this;
    }

    function INSERT($values){
      $this -> sql = '';

      $table = key($values);
      $column = [];

      foreach ($values[$table] as $value) {
        array_push($column, $value);
      }

      $this -> sql .= 'INSERT INTO ' . $table . ' SET ' . implode(' = ?, ', $column) . ' = ?';
      return $this;
    }

    function UPDATE($values){
      $this -> sql = '';

      $table = key($values);
      $column = [];

      foreach ($values[$table] as $value) {
        array_push($column, $value);
      }

      $this -> sql .= 'UPDATE ' . $table . ' SET ' . implode(' = ?, ', $column) . ' = ?';
      return $this;
    }

    function EXECUTE($values){
      try {
        global $db;

        $query = $db -> prepare($this -> sql);
        $query -> execute(func_get_args($values)[0]);

        $this -> sql = '';

        if(!$query){
          $error = $query -> errorInfo();
          return 'MySQL Error: ' . $error[2];
        } else {
          return 1;
        }

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    function QUERY_FETCH(){
      try {
        global $db;

        $query = $db -> query($this -> sql) -> fetch(PDO::FETCH_ASSOC);

        $this -> sql = '';

        return $query;

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    function QUERY_FETCHALL(){
      try {
        global $db;

        $query = $db -> query($this -> sql) -> fetchAll(PDO::FETCH_ASSOC);

        $this -> sql = '';

        return $query;

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    function PREPARE_FETCH($values){
      try {
        global $db;

        $prepare = $db -> prepare($this -> sql);
        $prepare -> execute(func_get_args($values)[0]);

        $this -> sql = '';

        $data = $prepare -> fetch(PDO::FETCH_ASSOC);

        return $data;

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    function PREPARE_FETCHALL($values){
      try {
        global $db;

        $prepare = $db -> prepare($this -> sql);
        $prepare -> execute(func_get_args($values)[0]);

        $this -> sql = '';

        $data = $prepare -> fetchAll(PDO::FETCH_ASSOC);
        return $data;

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    function ALL(){
      return $this -> sql;
    }

  }

?>
