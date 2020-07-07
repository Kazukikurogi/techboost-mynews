@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                    <a href="/admin" role="button" class="btn btn-primary">コメント</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
                <div class="comments_headline col-md-10 mx-auto">
                    <div class="cp_box">
                    <input id="cp00" type="checkbox">
	                    <label for="cp00">続きを読む</label>
	                    <div class="cp_container">
                        
                            <h3>コメント一覧</h3>
                            @if(!is_null($comments_headline))
                            <div class="comments_headline col-md-11 mx-auto">
                                    @foreach ($comments_headline as $comments)
                                        <h6>ニックネーム：{{ $comments->nickname }}</h6>
                                        <h6>コメント：{{ $comments->comment }}</h6>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
               <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                                
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                @endif
                            </div>
                            <a href="/admin" role="button" class="btn btn-primary">コメント</a>
                        </div>
                        <div class="comments_headline p=1">
                            <div class="cp_box2">
                                <input id="cp01" type="checkbox"/>
                                <label for="cp01">続きを読む</label>
        	                    <div class="cp_container2">
                                    <h3>コメント一覧</h3>
                                    @if(!is_null($comments_headline))
                                        <div class="comments_headline p=1">
                                            @foreach ($comments_headline as $comments)
                                                <h6>ニックネーム：{{ $comments->nickname }}</h6>
                                                <h6>コメント：{{ $comments->comment }}</h6>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection