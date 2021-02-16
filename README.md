# AtlasPHP
in between 2017-2018 i started to learn laravel because companies want this if you want to get a job by your PHP skill. But i didn't learned because made me confused but i liked style of laravel.

So i made my own MVC system. Ladies and Gentlemans, this is AtlasPHP!

### File Structure

```  php
$route = route();
```

- route() function is giving your url route when you print_r your $route. For example:

```  apacheconf
/blog/my-blog-post/5
```
return as:
```  php
Array([0] => blog [1] => my-blog-post [2] => 5)
```

- After than,  "blog" page come's up when we send $route[0] in controller() function as parameter. 

- System will check is blog.php file exists in AtlasPHP/App/Controllers

- If exists, AtlasPHP/App/Controllers/blog.php will run. If not exists, will run AtlasPHP/App/Controller/direct.php

- You should use Controllers/blog.php for Back-end.

- When you check Controllers/blog.php, you will see this code:

```  php
<?php require_once(view('blog')) ?>
```

- Meaning of this code is return AtlasPHP/App/Views/blog.php

- You should use Views/blog.php for Front-end.

- If you need to use footer, here is the function calling AtlasPHP/App/Containers/footer.php:

```  php
<?php require_once(container('footer')) ?>
```

- You can use CSS and JavaScript files in AtlasPHP/public by css() and js() functions on the correct line.

```html
<link rel="stylesheet" href="<?= css('blog') ?>">
```

- All of functions is inside of AtlasPHP/App/Helpers/page.php 

- All of Classes is inside of AtlasPHP/App/Classes 

- I will explain SQLstatements.php class right now.

### Connect Database
- i wrote the code of connect to database under the comment line  in AtlasPHP/App/MySQL.php . So you don't need to do anything, just change values as your database config in AtlasPHP/App/Config/database.php

AtlasPHP/App/MySQL.php
``` php
  $db = $sql -> DB_HOST($db_config['host'])
             -> DB_NAME($db_config['name'])
             -> CONNECT($db_config['user'], $db_config['pass']);
```

AtlasPHP/App/Config/database.php
``` php
return [
    'host' => 'localhost',
    'name' => 'my_database',
    'user' => 'root',
    'pass' => 'root'
  ];
```

### SELECT
```php
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
```
```
SELECT c.name, c.id, p.title, p.date FROM categories c, posts p
```

### WHERE
```php
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
```

```
SELECT c.name, c.id, p.title, p.date FROM categories c, posts p WHERE c.id == p.id && c.title == p.title
```

### LIKE
```php
  $like = $sql -> SELECT([
                    'categories' => [
                      '*'
                    ]
                  ])
               -> WHERE('')
               -> LIKE('name', 'hun%', 'OR')
               -> LIKE('surname', 'lik%')
               -> LIMIT('0', '5')
```

```
SELECT * FROM categories WHERE name LIKE 'hun%' OR surname LIKE 'lik%' LIMIT 0,5
```

### GROUP BY
```php
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
```

```
SELECT c.name, c.id, p.title, p.date FROM categories c, posts p GROUP BY p.title

```

### ORDER BY
```php
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
```

```
SELECT c.name, c.id, p.title, p.date FROM categories c, posts p GROUP BY p.title ORDER BY c.id DESC
```

### BETWEEN
```php
  $between = $sql -> SELECT([
                      'table' => [
                        '*'
                      ]
                     ])
                  -> where('price')
                  -> BETWEEN('10', '20', 'NOT')
```

```
SELECT * FROM table WHERE price NOT BETWEEN 10 AND 20
```

### JOIN
```php
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
```

```
SELECT Orders.order_id, Customers.CustomerName, Orders.OrderDate FROM Orders INNER JOIN Customers ON FIND_IN_SET(Orders.CustomerID, Customers.CustomerID)
```

### Fetch Data(QUERY FETCH)
``` php
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
                 -> QUERY_FETCH();
```

### Fetch Data(QUERY FETCHALL)
``` php
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
                 -> QUERY_FETCHALL();
```

### Fetch Data(PREPARE FETCH)
``` php 
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
                -> WHERE('c.id = ? && p.id = ?')
                -> PREPARE_FETCH(['5', '7'])
```

### Fetch Data(PREPARE FETCHALL)
``` php 
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
                -> WHERE('p.title = ?')
                -> PREPARE_FETCHALL(['ceyhun'])
```

### DELETE
```php
   $delete = $sql -> DELETE('Customers')
                  -> WHERE('CustomerName = ?')
                  -> EXECUTE(['customer_name'])
```

### INSERT
```php
   $insert = $sql -> INSERT([
                      'uyeler' => [
                        'uye_kadi',
                        'uye_sifre',
                        'uye_eposta'
                      ]
                    ])
                  -> EXECUTE(['kadi_value', 'sifre_value', 'eposta_value'])
```

### UPDATE
```php
   $update = $sql -> UPDATE([
                       'uyeler' => [
                         'uye_kadi',
                         'uye_sifre',
                         'uye_eposta'
                       ]
                     ])
                  -> WHERE('uye_kadi = ?')
                  -> EXECUTE(['kadi_value', 'sifre_value', 'eposta_value', 7])
```