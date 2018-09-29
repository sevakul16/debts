<?php
require 'vendor/autoload.php';
$db = new \atk4\data\Persistence_SQL('mysql:dbname=debts;host=localhost;','sexking','lehaloh');


Class Client extends \atk4\data\Model {
  public $table ='client';
  Function init() {
    parent::init();
    $this -> addField('login');
    $this -> addField('password',['type'=>'password']);
    $this ->hasMany('Friends',new Friends);
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
    $this ->hasMany('Loans', new Loans);
    $this ->hasMany('Loans2', new Loans2);
  }
}

Class Loans extends \atk4\data\Model {
  public $table ='loans';
  Function init() {
    parent:: init();
    $this -> addField('sum',['type'=>'money']);
    $this -> addField('date',['type'=>'date']);
    $this -> hasOne('friends_id',new Friends);
  }

  Class Loans2 extends \atk4\data\Model {
    public $table ='loans2';
    Function init() {
      parent:: init();
      $this -> addField('sum',['type'=>'money']);
      $this -> addField('date',['type'=>'date']);
      $this -> hasOne('friends_id',new Friends);
    }
