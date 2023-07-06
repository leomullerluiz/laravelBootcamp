<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['body'] = strip_tags($fields['body']);
        $fields['user_id'] = auth()->id();
        //O correto seria criar a Model no singular, mas a tabela no banco de dados acabou sendo criada no singular
        //$ php artisan make:migrate create_post_table
        //O correto é
        //$ php artisan make:migrate create_posts_table
        Post::create($fields); 
        return redirect('/');
    }


}
