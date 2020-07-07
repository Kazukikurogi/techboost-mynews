<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;
use App\Comments;

class NewsController extends Controller
{
    public function index(Request $request)
    
    {
      
        $posts = News::all()->sortByDesc('updated_at');
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        $comments = Comments::all();
    
        if (count($comments) > 0) {
            $comments_headline = $comments;
        } else {
            $comments_headline = null;
        }
         return view('news.index', ['headline' => $headline, 'posts' => $posts, 'comments_headline' => $comments_headline, 'comments' => $comments]);
    }
    
}
