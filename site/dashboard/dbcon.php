<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('accessguard-459d3-firebase-adminsdk-bsqmn-251aba876d.json')
    ->withDatabaseUri('https://accessguard-459d3-default-rtdb.firebaseio.com');

$database = $factory->createDatabase();

?>