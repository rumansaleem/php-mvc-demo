<?php

class PostController extends Controller
{
    public function store()
    {
        if (!isSignedIn()) {
            return redirect('/');
        }
    
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $author_id = $_SESSION['auth'];
    
        $query = "INSERT INTO posts (title, content, author_id) VALUES (:title, :content, :author_id)";
    
        Database::getInstance()->execute($query, [
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id,
        ]);

        return redirect('/');
    }
}