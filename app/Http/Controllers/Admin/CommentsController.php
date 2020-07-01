<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function add()
    {
        return view('admin.comments.comments');
    }
    
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required'
            ];
            
        $message = array(
            'title.required' => 'タイトルを入力してください',
            'content.required' => 'カテゴリーを入力してください',
            );
        
        return redirect('/');
        
    }
}
