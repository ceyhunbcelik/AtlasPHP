# AtlasPHP
in between 2017-2018 i started to learn laravel because companies want this if you want to get a job by your PHP skill. But i didn't learned because made me confused but i liked style of laravel.

So i made my own MVC system. Ladies and Gentlemans, this is AtlasPHP!

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