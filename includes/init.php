<?php

  ob_start(); // turn on output buffering

  
  
  require_once('includes/new_config.php');
  require_once('includes/database.php');
  require_once('includes/functions.php');

// -> All classes in directory
foreach(glob('class/*.class.php') as $file) {
  require_once($file);
}

// Autoload class definitions
function my_autoload($class) {
  if(preg_match('/\A\w+\Z/', $class)) {
    include('class/' . $class . '.class.php');
  }
}
spl_autoload_register('my_autoload');
 

  

  $database = db_connect();
  Database::set_database($database);

?>
