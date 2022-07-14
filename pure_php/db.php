<?php
     session_start();    
          $db = new PDO("mysql:host=localhost;dbname=onboarding","root","");
          //$db->setAttribute(PDO::ATTR_AUTOCOMMIT,1);
          $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);            
    
?>