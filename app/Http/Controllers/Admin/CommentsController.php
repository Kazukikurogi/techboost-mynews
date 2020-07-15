<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;
use App\News;

class CommentsController extends Controller
{
    public function add($news_id)
    {
        
      
        return view('admin.comments.comments',  ['news_id'=>$news_id]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Comments::$rules);
        
        $comment = new Comments;
        $form = $request->all();
        
        $comment->fill($form);
        $comment->save();
        
        return redirect('/');
        
    }
    
}
