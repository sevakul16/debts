<?php
require 'vendor/autoload.php';
$db = new \atk4\data\Persistence_SQL('mysql:dbname=debts;host=localhost;','root','');


Class Client extends \atk4\data\Model {
  public $table ='client';
  Function init() {
    parent::init();
    $this -> addField('login');
    $this -> addField('password',['type'=>'password']);
    $this -> addField('name');
    $this -> addField('surname');
    $this ->hasMany('friends',new Friends);
  }
}

Class Friends extends \atk4\data\Model {
  public $table ='friends';
  Function init() {
    parent:: init();
    $this -> addField('name');
    $this -> addField('surname');
    $this -> addField('date',['type'=>'date']);
    $this -> addField('debt');
    $this ->hasOne('client_id',new Client);
  }
}
