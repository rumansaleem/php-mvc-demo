<?php

class PagesController extends Controller
{
    public function home() {
        $query = 'SELECT posts.*, users.name as  author_name FROM posts INNER JOIN users ON author_id = users.id;';
    
        $statement = $this->db->prepare($query);

        if ($statement === false) {
            die('<b>SQLError: </b>' . $this->db->error);
        }

        if ($statement->execute() === false) {
            die('<b>SQLError: </b>' . $statement->error);
        }

        $posts = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        return view('home', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}