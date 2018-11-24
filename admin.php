<?php
require 'vendor/autoload.php';
require 'Models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');

$client = new Client($db);
$friends = new Friends($db);


$grid = $app->add('Crud');
$grid->setModel($client);

$grid2 = $app->add('Crud');
$grid2->setModel($friends);
