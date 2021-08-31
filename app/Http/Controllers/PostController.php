<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function debug(Request $request)
    {
        $post = new Post();
        /*$post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->content = $request->content;
        $post->save();*/

        $post->create($request->except(['_token']));
    }

    public function show(Post $post)
    {
        echo "<h1>Artigo</h1>";
        echo "<p>#{$post->id}, {$post->title}, {$post->content}</p>";

        $user = $post->author()->first();

        if ($user) {
            echo "<h1>Author</h1>";
            echo "<p>Nome: {$user->name} E-mail: {$user->email}</p>";
        }

        $categories = $post->categories()->get();

        if($categories) 
        {
            echo"<h1>Categorias</h1>";

            foreach($categories as $category)
            {
                echo"<p>#{$category->id} {$category->title}</p>";
            }
        }
    }
}
