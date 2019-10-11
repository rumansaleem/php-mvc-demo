<?php

class PagesController extends Controller
{
    public function home() {
        $query = 'SELECT posts.*, users.name as author_name FROM posts INNER JOIN users ON author_id = users.id';
    
        $posts = Database::getInstance()
            ->execute($query)
            ->fetchAll(PDO::FETCH_ASSOC);

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