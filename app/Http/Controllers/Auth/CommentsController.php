<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\Comments;

class CommentsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Comments::all();
        return View::make('news.index')->with('posts',$posts);

        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}