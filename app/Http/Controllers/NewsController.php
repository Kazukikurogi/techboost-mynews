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
      
        $news_list= News::all()->sortByDesc('updated_at');
        if (count($news_list) > 0) {
            $headline = $news_list->shift();
        } else {
            $headline = null;
        }
        
        foreach ($news_list as $news) {
            $comments = $news->comments();
            $news_comments[] = [
                'comment' => $news ->nickname,
                'comment' => $news ->comment
            ];
        }
        
         return view('news.index', ['headline' => $headline, 'news_list' => $news_list, 'news' => $news, 'news_comments' => $news_comments, 'comments' => $comments]);
    }
    
}
