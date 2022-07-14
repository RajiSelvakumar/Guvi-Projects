
<?php
require '../vendor/autoload.php';
     session_start();    
          $db = new PDO("mysql:host=remotemysql.com;dbname=7MCjsuPWsg","7MCjsuPWsg","R0dA8fp0YX");
          $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);  
          
          $redis = new Predis\Client(array(
               'host' => ('redis-13641.c92.us-east-1-3.ec2.cloud.redislabs.com'),
               'port' => (13641),
               'password' => ('zbkbuY3f65W4lGZwsGdKWAvAwrkFNwyg'),
           ));
           echo "redis success";
          
     
?>