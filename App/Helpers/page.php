<?php

  function controller($controllerName){
    return PATH . '/App/Controllers/' . strtolower($controllerName) . '.php';
  }

  function admin_controller($controllerName){
    return PATH . '/App/Admin/Controllers/' . strtolower($controllerName) . '.php';
  }

  function view($viewName){
    return PATH. '/App/Views/' . strtolower($viewName) . '.php';
  }

  function admin_view($viewName){
    return PATH. '/App/Admin/Views/' . strtolower($viewName) . '.php';
  }

  function container($containerName){
    return PATH . '/App/Containers/' . strtolower($containerName) . '.php';
  }

  function css($cssName){
    return URL . '/Public/css/' . strtolower($cssName) . '.css';
  }

  function img($imgName){
    return URL . '/Public/img/' . strtolower($imgName);
  }

  function js($jsName){
    return URL . '/Public/js/' . strtolower($jsName) . '.js';
  }

 ?>
