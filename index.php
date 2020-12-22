<?php

  $_GET = array_map(function($get){
    return htmlspecialchars(trim($get));
  }, $_GET);

  require_once('App/Atlas.php');

  $route = route();

  # Disallowed Route Direct
  if($route[0] == 'direct') Header('Location:'. $DEVELOPMENT .'/');

  # Page
  if(glob(controller($route[0])))
    require_once(controller($route[0]));
  else
    require_once(controller('direct'));

?>
