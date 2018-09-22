<?php
session_start();
require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');

$db = new \atk4\data\Persistence_SQL('mysql:dbname=debts;host=localhost;','root','');

$client = new Client($db);
$friend = $client->ref('Friends');

$form = $app -> layout->add('Form');
$form ->setModel (new Client($db));

$form2 = $app -> layout->add('Form');
$form2 ->setModel (new Friends($db));

$grid = $app->add('Grid');
$grid->setModel($friend);

//$grid2 = $app->add('Grid');
