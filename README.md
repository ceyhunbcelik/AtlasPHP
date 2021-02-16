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