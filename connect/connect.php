<?php
  require_once "dbObjectClass.php" ;
  $username = "root";
  $password = "";
  $host = "localhost";
  $db = "meetup";
  $db = new dbObject($username,$password,$host,$db);
  $db->connect();
