<?php
/*require 'vendor/autoload.php';
require 'models.php';
$app = new \atk4\ui\App ('Debts');
$app->initLayout('Centered');


session_start();

$user = new Client($db);
$log = $app ->layout ->add('Form');
$log->setModel(new Client($db),['login','password']);
$log->buttonSave->set('Enter');
$log -> onSubmit(function($log) use ($user){
  if (($log->model['login']=='admin') and ($log->model['password']=='admin')) {
      return new \atk4\ui\jsExpression('document.location="admin.php"');
  }
  $user ->TryLoadBy('login',$log ->model['login']);
  if ($user['password'] == $log ->model['password']){
    $_SESSION['id'] = $user ->id;
    return new \atk4\ui\jsExpression('document.location="main.php"');
  } else {
    $user ->unload();
    $er = (new \atk4\ui\jsNotify('Wrong login or password'));
    $er -> setColor('purple');
    return $er;
  }
});
*/
echo 'rabotaet';
