<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser()
    {
      /*$user = new User();
        $user->name = 'Délcio Francisco';
        $user->email = 'delciofrancisco1@gmail.com';
        $user->password = Hash::make('123');
        $user->save();*/

        //echo"<h1>Listagem de Usuários</h1>";
        
        $user = User::where('id','=', 1)->first();
        //dd($user);
        return view('listUser', [
            'user' => $user
        ]);
    }
}
