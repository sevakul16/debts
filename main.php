<?php
session_start();
require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');

class UserForm extends \atk4\ui\Form {
    function setModel($m, $fields = null) {
        parent::setModel($m, false);


        $this->addField('name');
        $this->addField('surname');
        $this->addField('date');
      //  $this->addField('client_id');
        $this -> model['client_id'] = $client->id;
  //      $m['client_id'] = $client->id;
        return $this->model;
    }
}


$client = new Client($db);
$client -> load($_SESSION['id']);
$friend = $client->ref('Friends');



$crud = $app ->layout ->add('Crud');
//,'formDefault'=>new UserForm($crud)]

$crud -> setModel($friend);
/*$crud-> onSubmit(function($crud){

});*/
$crud -> addDecorator ('name', new \atk4\ui\TableColumn\Link('gap.php?friends_id={$id}') );

$client_2 = new Client($db);
$form =$app ->layout ->add('Form');
$form -> setModel(new Client($db),['login']);
$form -> onSubmit(function($form) use($client_2,$db) {
  if ($client_2->tryLoadBy('login',$form->model['login'])==TRUE) {
  $newFriend = new Friends($db);
  $newFriend['name'] = $client_2['name'];
  $newFriend['surname'] = $client_2['surname'];
  $newFriend['true_friend'] = $client_2 ->id;
  $newFriend-> save();
  }
  return $form->succses('Mama I just killed a man');
});

//$grid2 = $app->add('Grid');
