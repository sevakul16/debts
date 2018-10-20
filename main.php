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

$crud = $app ->layout ->add(['Crud','formDefault'=>new UserForm($crud)]);
$crud -> setModel(new Friends($db));
/*$crud-> onSubmit(function($crud){

});*/
$crud -> addDecorator ('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}') );


//$grid2 = $app->add('Grid');
