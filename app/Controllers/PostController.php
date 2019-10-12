<?php

class PostController extends Controller
{
    public function store($request)
    {
        if (!isSignedIn()) {
            return redirect('/');
        }
    
        $query = "INSERT INTO posts (title, content, author_id) VALUES (:title, :content, :author_id)";
    
        Database::getInstance()->execute($query, [
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'author_id' => $_SESSION['auth'],
        ]);

        return redirect('/');
    }
}