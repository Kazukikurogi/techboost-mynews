<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;

class CommentsController extends Controller
{
    public function add()
    {
        return view('admin.comments.comments');
    }
    
    public function create(Request $request)
    {
        
        return redirect('/');
        
    }
}
