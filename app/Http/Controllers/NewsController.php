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
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        
        $news_comments = [];
        foreach($posts as $headline_news) {
            $comments_get = $headline_news->comments();
            $news_comments[] = [
                'news_title' ->$headline_news=>'title', 
                'news_title' ->$headline_news=>'body', 
                'comments' ->$comments_get=>'nickname',
                'comments' ->$comments_get=>'comment'
                ];
        }
    
        return view('news.index', [ 'headline' => $headline, 'posts' => $posts, 'news_comments'=>$news_comments,
        ]);
    
    }
        
}
