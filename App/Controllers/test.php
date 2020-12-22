<?php

  # SELECT
  $select = $sql -> SELECT([
                    'categories c' => [
                      'c.name',
                      'c.id'
                    ],
                    'posts p' => [
                      'p.title',
                      'p.date'
                    ]
                  ])
              -> ALL();

  echo '<h3>SELECT</h3>';
  echo $select;
  echo '<br>';

  # WHERE
  $where = $sql -> SELECT([
                    'categories c' => [
                      'c.name',
                      'c.id'
                    ],
                    'posts p' => [
                      'p.title',
                      'p.date'
                    ]
                  ])
                -> WHERE('c.id == p.id && c.title == p.title')
                -> ALL();

  echo '<h3>WHERE</h3>';
  echo $where;
  echo '<br>';
  

 ?>
