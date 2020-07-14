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
        $posts= News::all()->sortByDesc('updated_at');
        
        
        
        $news_comments = [];
        foreach($posts as $headline_news) {
            $comments = $headline_news->comments();
            $news_comments[] = [
                'news' =>$headline_news, 
                'comments' =>$comments,
                ];
        }
    
        return view('news.index', [ 'posts' => $posts, 'news_comments'=>$news_comments
        ]);
    }
        
}
