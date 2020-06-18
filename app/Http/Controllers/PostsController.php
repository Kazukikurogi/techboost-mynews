<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//追記
use App\Post;
use Storage;

class PostsController extends Controller
{
    //追記
    public function add()
  {
      return view('news.create');
  }

  public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`/`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('/', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);

      $post->save();

      return redirect('news/create');
  }
}
