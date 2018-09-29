<?php
session_start();
require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');


$client = new Client($db);
$friend = $client->ref('Friends');


$grid = $app->add('Grid');
$grid->setModel($friend);

//$grid2 = $app->add('Grid');
