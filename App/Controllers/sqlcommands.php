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

  # LIKE
  $like = $sql -> SELECT([
                    'categories' => [
                      '*'
                    ]
                  ])
               -> WHERE('')
               -> LIKE('name', 'hun%', 'OR')
               -> LIKE('surname', 'lik%')
               -> LIMIT('0', '5')
               -> ALL();

  echo '<h3>LIKE</h3>';
  echo $like;
  echo '<br>';

  # GROUP BY
  $group_by = $sql -> SELECT([
                        'categories c' => [
                          'c.name',
                          'c.id'
                        ],
                        'posts p' => [
                          'p.title',
                          'p.date'
                        ]
                      ])
                   -> GROUP_BY('p.title')
                   -> ALL();

  echo '<h3>GROUP BY</h3>';
  echo $group_by;
  echo '<br>';

  # ORDER BY
  $order_by = $sql -> SELECT([
                        'categories c' => [
                          'c.name',
                          'c.id'
                        ],
                        'posts p' => [
                          'p.title',
                          'p.date'
                        ]
                      ])
                   -> GROUP_BY('p.title')
                   -> ORDER_BY('c.id', 'DESC')
                   -> ALL();

  echo '<h3>ORDER BY</h3>';
  echo $order_by;
  echo '<br>';

  # Between
  $between = $sql -> SELECT([
                      'table' => [
                        '*'
                      ]
                     ])
                  -> where('price')
                  -> BETWEEN('10', '20', 'NOT')
                  -> ALL();

   echo '<h3>BETWEEN</h3>';
   echo $between;
   echo '<br>';

   # Join
   $join = $sql -> SELECT([
                    'Orders' => [
                      'Orders.order_id',
                      'Customers.CustomerName',
                      'Orders.OrderDate'
                    ]
                   ])
                -> INNER_JOIN('Customers')
                -> ON(
                    'Orders.CustomerID',
                    'Customers.CustomerID',
                    'FIND'
                   )
                -> ALL();

   echo '<h3>JOIN</h3>';
   echo $join;
   echo '<br>';

   # Delete
   $delete = $sql -> DELETE('Customers')
                  -> WHERE('CustomerName = ?')
                  -> ALL();

   echo '<h3>DELETE</h3>';
   echo $delete;
   echo '<br>';

   # Insert
   $insert = $sql -> INSERT([
                      'uyeler' => [
                        'uye_kadi',
                        'uye_sifre',
                        'uye_eposta'
                      ]
                    ])
                  -> ALL();

   echo '<h3>INSERT</h3>';
   echo $insert;
   echo '<br>';

   # Update
   $update = $sql -> UPDATE([
                       'uyeler' => [
                         'uye_kadi',
                         'uye_sifre',
                         'uye_eposta'
                       ]
                     ])
                  -> WHERE('uye_kadi = ?')
                  -> ALL();

   echo '<h3>UPDATE</h3>';
   echo $update;
   echo '<br>';
 ?>
