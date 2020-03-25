<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){

        # process variables data or params 
        # talk to model
        # receive data from model
        # compile or process data
        # pass data to correct folder
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        return view('static.welcome')->withPosts($posts);
    }

    public function about(){

        $first = 'Akshit';
        $last = 'Batra';
        $fullname = $first ." ". $last;
        $email = 'akbatra567@gmail.com';
        return view('static.about')->withFullname($fullname)->withEmail($email);
    }


    public function contact(){
        return view('static.contact');
    }
}
