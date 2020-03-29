<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Post;
use Session;
class PagesController extends Controller
{
    public function index(){

        # process variables data or params 
        # talk to model
        # receive data from model
        # compile or process data
        # pass data to correct folder
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        return view('home.welcome')->withPosts($posts);
    }

    public function about(){

        $first = 'Akshit';
        $last = 'Batra';
        $fullname = $first ." ". $last;
        $email = 'akbatra567@gmail.com';
        return view('home.about')->withFullname($fullname)->withEmail($email);
    }


    public function getContact(){
        return view('home.contact');
    }
    
    public function postContact(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];
        Mail::send('emails.contact', $data, function($message) use ($data)
        {
            $message->from($data['email']);
            $message->to('akbatra567@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent');
        return redirect()->route('home');
    }
}
