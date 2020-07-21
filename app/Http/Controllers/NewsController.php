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
        
        $news_headline_comments =[];
            $headline_comments = $headline->comments;
            $news_headline_comments[] = [
                'headline' => $headline,
                'headline_comments' =>$headline_comments
                ];
        
         $headline_comments->count();
        
        $news_comments = [];
        foreach($posts as $news) {
            $comments = $news->comments;
            $news_comments[] = [
                'news' =>$news, 
                'comments' =>$comments,
                ];
        }
        
        $comments->count();
        
        return view('news.index', [ 'headline' => $headline, 'posts' => $posts, 'news_headline_comments'=>$news_headline_comments, 
        'news_comments'=>$news_comments, 'headline_comments' =>$headline_comments,'comments' =>$comments
        ]);
    }
    
    public function store_search(Request $request)
    {
    $news_word = $request->news_word;
          if ($news_word != '') {
              $word_posts = News::where('title','LIKE', "%$news_word%")
              ->orWhere('body' ,'LIKE', "%$news_word%")->get();
        } else {
              $word_posts = News::all();
          }
          
          return view('news.search',['news_word'=> $news_word, 'word_posts'=> $word_posts]);
    }
}
