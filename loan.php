<?php
session_start();
require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');

$friends = new Friends($db);
$friends -> load($_SESSION['friends_id']);
$loans = $friends -> ref('Loans');
$vozvrat = $friends -> ref('Vozvrat');

$grid = $app ->add('Crud');
$grid -> setModel($loans);

$grid2 = $app ->add('Crud');
$grid2 -> setModel($vozvrat);

class ReminderBox extends \atk4\ui\View {
  public $ui='piled segment';
  public function setModel(\atk4\data\Model $friends) {
    $this -> add('Header') ->set('Pay bich '.$friends['name']);
    $this -> add('Text') ->addParagraph('I have loaned you a total of ' . $friends['total_borrowed']
    .'$ from which you still owe me ' . ($friends['total_borrowed']-$friends['total_returned']) . '$. Pay back, you cunt!' );
    $this -> add('Text')->addParagraph('Thanks!');
  }
}


$button = $app ->add(['Button','Touch me','primary']);
$popup = $app->add(['Popup',$button]);

$popup ->set(function($popup) use($friends) {
  $popup->add(new ReminderBox())->setModel($friends);
});
