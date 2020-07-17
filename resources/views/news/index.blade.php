@extends('layouts.front')

@section('content')
<div class="front mx-auto">
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
                                <div class="title p-3">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                    <a href="{{ url('/admin/' . $headline['id']) }}" role="button" class="btn btn-primary">コメント</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ $headline->updated_at->format('Y年m月d日') }}</p>
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                        <div>
                  	         <p class="body mx-auto">{{ $headline_comments_count }}件のコメント</p>
                        </div>
                    </div>
                </div>
            </div>
                <div class="news_comments col-md-10 mx-auto">
                    <div class="cp_box">
                    <input id="cp00" type="checkbox">
	                    <label for="cp00">続きを読む</label>
	                    <div class="cp_container">
                            <h3>コメント一覧</h3>
                            @if(!is_null($headline))
                                <div class="news_comments col-md-11 mx-auto">
                                    @foreach ($headline_comments as $comment)
                                        <h6>ニックネーム：{{ $comment['nickname'] }}</h6>
                                        <h6>コメント：{{ $comment['comment'] }}</h6>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            <hr color="#c0c0c0">
        @endif
            
        <div class="row">
            <div class="news col-md-8 mx-auto mt-3">
                @foreach($news_comments as $news_comment)
                    <div class="news_comments">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="caption mx-auto">
                                    <div class="date">
                                        <p>{{ $news_comment['news']['updated_at']->format('Y年m月d日') }}</p>
                                    </div>
                                    <div class="title">
                                        {{ str_limit($news_comment['news']['title'], 150) }}
                                    </div>
                                    <div class="body mt-3">
                                        {{ str_limit($news_comment['news']['body'], 1500) }}
                                    </div>
                                    <a href="{{ url('/admin/' . $news_comment['news']['id']) }}" role="button" class="btn btn-primary">コメント</a>
                                </div> 
                            </div>
                                <div class="caption mx-auto">
                                   <div class="image   row">
                                        @if ($news_comment['news']['image_path'])
                                        <img src="{{ $news_comment['news']['image_path'] }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="body mx-auto">{{ $comments_count }}件のコメント</p>
                            </div>
                        </div>
                            <div class="cp_box p=1 col-md-10 mx-auto">
                                <input id="cp01" type="checkbox"/>
                                <label for="cp01">続きを読む</label>
            	                   <div class="cp_container">
                                        <h3>コメント一覧</h3>
                                           @if(!is_null($news_comments))
                                            <div class="cp_box p=1">
                                                @foreach ($news_comment['comments'] as $comment)
                                                    <h6>ニックネーム：{{ $comment['nickname'] }}</h6>
                                                    <h6>コメント：{{ $comment['comment'] }}</h6>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                            </div>
                            <hr color="#c0c0c0">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection