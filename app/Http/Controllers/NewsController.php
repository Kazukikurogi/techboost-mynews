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
            $news = $news_list->shift();
        } else {
            $news = null;
        }
        
        $news_comments = [];
        foreach ($news_list as $news) {
            $comments = $news->comments();
            $news_comments[] = [
                'news_title' => $news->title,
                'news_title' => $news->body,
                'comments'   => $comments
            ];
        }
        
         return view('news.index', ['news' => $news, 'news_list' => $news_list, 'news_comments' => $news_comments, 'comments' => $comments]);
    }
    
}
