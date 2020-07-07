<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 下記内容をapp/Http/Controllers/NewsControllerに移行
use App\Comments;

class CommentsController extends Controller
{
     public function index(Request $request)
     {
        $comments = Comments::all();
        
        if (count($comments) > 0) {
            $comments_headline = $comments;
        } else {
            $comments_headline = null;
        }
        
         return view('news.index', ['comments_headline' => $comments_headline, 'comments' => $comments]);
     }
    
    


    }
