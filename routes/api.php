<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Users;

Route::get('/', function (Request $request) {
    return redirect('/users');
});

Route::get('/users', function (Request $request) {
    $Users = new Users();
    return $Users->getUsers();
});

Route::get('/quantifies', function (Request $request) {
    $Users = new Users();
    $listUsers = $Users->getUsers();
    $listQuantifies = (object) array();
    foreach ($listUsers as $i => $user) {
      foreach (str_split($user->email) as $j => $letra) {
          (property_exists($listQuantifies, $letra)) ?
            ($listQuantifies->$letra = ($listQuantifies->$letra + 1)) : ($listQuantifies->$letra = 1);
      }
    }
    $Quantifies = (object) array();
    for($i=65; $i<=90; $i++) {
      $letra = chr($i);
      (property_exists($listQuantifies, $letra)) ? $Quantifies->$letra = $listQuantifies->$letra : null;
    }
    return json_encode($Quantifies);
});

Route::get('/coincidences/{email}', function (Request $request, $email) {
    $Users = new Users();
    $list = $Users->getCoincidencias($email);
    return json_encode($list);
});


Route::post('/create', function (Request $request) {
  $Users = new Users();
  $list = $Users->create($request);
  $response = array('success' => true,'message' => 'Usuario creado' );
    return json_encode($response);
});

Route::post('/delete', function (Request $request) {
  $Users = new Users();
  $list = $Users->deleteUser($request);
  $response = array('success' => true,'message' => 'Usuario eliminado' );
  return json_encode($response);
});
