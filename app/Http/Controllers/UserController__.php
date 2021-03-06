<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResourse;
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

        $user = User::where('id', '=', 1)->first();
        //dd($user);
        return view('listUser', [
            'user' => $user
        ]);
    }

    public function showw($id)
    {
        $user = User::where('id', $id)->first();
        //dd($user);
        if ($user) {
            echo "<h1>Dados do usuário</h1>";
            echo "<p>Nome: {$user->name} E-mail: {$user->email}</p>";
        }

        $address = $user->address()->first();

        if ($address) {
            echo "<h1>Endereço</h1>";
            echo "<p>Endereço Completo: {$address->street}, {$address->number}, {$address->city}, {$address->state}</p>";
        }

        $posts = $user->posts()->get();

        if ($posts) {
            echo "<h1>Artigos</h1>";
            foreach ($posts as $post) {
                echo "<p>#{$post->id}, {$post->title}, {$post->content}";
            }
        }
    }

    public function index()
    {
        $users = User::paginate(10);
        return UserResourse::collection($users);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save())
        {
           return new UserResourse($user);
        } 
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResourse($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save())
        {
           return new UserResourse($user);
        } 
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete())
        {
            return new UserResourse($user);
        }
        
    }
}
