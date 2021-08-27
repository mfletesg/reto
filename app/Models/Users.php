<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getUsers()
    {
        $users = DB::SELECT('SELECT u.id, u.name, u.username, upper(u.email) as email, u.status FROM users u');
        return $users;
    }

    public function getCoincidencias($email)
    {
        $users = DB::SELECT(' SELECT
                                u.id,
                                u.email as email
                              FROM users u
                              WHERE u.email LIKE "%'.$email.'%"');
        return $users;
    }

    public function create($request)
    {
      $name = $request->input('name');
      $username = $request->input('username');
      $email = $request->input('email');
      $users = DB::INSERT('INSERT INTO users (name, username, email) VALUES (?, ?, ?)', [$name, $username, $email]);
      return true;
    }

    public function deleteUser($request)
    {
      $id = $request->input('id');
      DB::DELETE('DELETE FROM users WHERE id = '.$id);
      return true;
    }
}
