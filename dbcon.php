<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)
->withServiceAccount('php-firebase-fcaa0-firebase-adminsdk-5mfc9-ca7c6e1cd3.json')
->withDatabaseUri('https://php-firebase-fcaa0-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>