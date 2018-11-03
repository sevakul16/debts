<?php
require 'vendor/autoload.php';
$db = new \atk4\data\Persistence_SQL('mysql:dbname=debts;host=localhost;','sexking','lehaloh');


Class Client extends \atk4\data\Model {
  public $table ='client';
  Function init() {
    parent::init();
    $this -> addField('login');
    $this -> addField('password',['type'=>'password']);
    $this -> addField('name');
    $this -> addField('surname');
    $this ->hasMany('Friends',new Friends);
  }
}

Class Friends extends \atk4\data\Model {
  public $table ='friends';
  Function init() {
    parent:: init();
    $this -> addField('name');
    $this -> addField('surname');
    $this -> addField('true_friend');
    $this ->hasOne('client_id',new Client);
    $this ->hasMany('Loans', new Loans) -> addField('total_borrowed',['aggregate'=>'sum','field'=>'sum']);
    $this ->hasMany('Vozvrat', new Vozvrat) -> addField('total_returned',['aggregate'=>'sum','field' =>'sum']);

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
}

  Class Vozvrat extends \atk4\data\Model {
    public $table ='vozvrat';
    Function init() {
      parent:: init();
      $this -> addField('sum',['type'=>'money']);
      $this -> addField('date',['type'=>'date']);
      $this -> hasOne('friends_id',new Friends);
    }
  }
