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
    
        $query = "INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?);";
    
        $statement = $this->db->prepare($query);
        $statement->bind_param('ssi', $title, $content, $_SESSION['auth']);
    
        $statement->execute();
    
        return redirect('/');
    }
}