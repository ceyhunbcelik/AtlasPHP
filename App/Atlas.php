<?php

  session_start();
  ob_start();

  define('PATH', realpath('.'));
  define('SUBFOLDER', subfolder());
  define('URL', url());

  $tmp = explode('/', PATH);
  $DEVELOPMENT = SUBFOLDER == true ? end($tmp) : null;

  function subfolder(){
    return dirname($_SERVER['SCRIPT_NAME']) === '\\' || dirname($_SERVER['SCRIPT_NAME']) == '/' ? 0 : 1;
  }

  function route(){
    $request = explode("?", $_SERVER['REQUEST_URI']);
    $request = explode('/', $request[0]);

    foreach ($request as $val)
      if(!empty($val))
        $route [] = $val;

    if(SUBFOLDER == true)
      array_shift($route);

    if(!isset($route[0]))
      $route[0] = 'index';

    return $route;
  }

  function url(){

    $protocol = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : "http";
    $script   = dirname($_SERVER['SCRIPT_NAME']) == "\\" || dirname($_SERVER['SCRIPT_NAME']) == '/'
      ? '/'
      : dirname($_SERVER['SCRIPT_NAME']) . '/';

    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $script;
  }

  // Classes
  foreach(glob(PATH . '/App/Classes/*.php') as $ClassFile){
    require_once($ClassFile);
  }

  // Helpers
  foreach(glob(PATH . '/App/Helpers/*.php') as $helperFile){
    require_once($helperFile);
  }

  # Define SQLStatements
  $sql = new SQLStatements();

  // Database



 ?>
