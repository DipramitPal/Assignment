<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'u309458139_admin');
   define('DB_PASSWORD', 'abcd1234');
   define('DB_DATABASE', 'u309458139_users');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(!$db)
   {
   	die('ERROR:'.mysql_error());
   }
?>

