<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        # process variables data or params 
        # talk to model
        # receive data from model
        # compile or process data
        # pass data to correct folder
        return view('static.welcome');
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
