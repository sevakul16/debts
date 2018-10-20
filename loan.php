<?php
session_start();
require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');

$friends = new Friends($db);
$loans = $friends -> ref('Loans');
$vozvrat = $friends -> ref('Vozvrat');

$grid = $app ->add('Crud');
$grid -> setModel($loans);

$grid2 = $app ->add('Crud');
$grid2 -> setModel($vozvrat);

class ReminderBox extends \atk4\ui\View {
  public $ui - 'piled segment';
  public function setModel(\atk4\data\Model $friends) {
    $this ->
  }
}
