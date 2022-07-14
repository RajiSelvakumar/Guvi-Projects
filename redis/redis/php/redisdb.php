<?php
require '../vendor/autoload.php'; 
try {
    
    $redis = new Predis\Client(array(
        'host' => ('redis-13641.c92.us-east-1-3.ec2.cloud.redislabs.com'),
        'port' => (13641),
        'password' => ('zbkbuY3f65W4lGZwsGdKWAvAwrkFNwyg'),
    ));
    //print_r("redis connected successfully");
      
} catch (Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>