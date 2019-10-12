<?php

class PostController extends Controller
{
    public function store($request)
    {
        if (Auth::guest()) {
            return redirect('/');
        }
    
        Database::table('posts')->insert([
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'author_id' => $_SESSION['auth'],
        ]);

        return redirect('/');
    }
}