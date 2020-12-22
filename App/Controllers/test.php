<?php

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
              -> all();

  echo $select;

 ?>
