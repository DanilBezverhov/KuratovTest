<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class comController extends Controller
{
    public function index()
    {
       
        $comments = Comment::all();
        return view('welcome', ['comments' => $comments]);
    }
    
    public function comments(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

       
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        
        $comments = Comment::all();

        
    }

    
}
