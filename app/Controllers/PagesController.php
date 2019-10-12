<?php

namespace App\Controllers;

class PagesController extends Controller
{
    public function home() 
    {
        $posts = $this->builder->table('posts')
            ->select(['posts.*', 'users.name as author_name'])
            ->innerJoin('users', 'author_id', 'users.id')
            ->all();

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