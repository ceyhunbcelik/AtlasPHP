<?php

  require_once('App/Base.php');

  $data = $sql -> select([
                    'categories c' => [
                      'c.name',
                      'c.id'
                    ],
                    'posts p' => [
                      'p.title',
                      'p.date'
                    ]
                  ])
              -> all();

  echo '<br>'.$data;

?>
