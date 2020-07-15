@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @foreach($news_comments as $news_comment)
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($news_comment['news']['image_path'])
                                        <img src="{{ $news_comment['news']['image_path'] }}">
                                    @endif
                                </div>     
                                <div class="title p-2">
                                    <h1>{{ str_limit($news_comment['news']['title'], 70) }}</h1>
                                    <a href="{{ url('/admin/' . $news_comment['news']['id']) }}" role="button" class="btn btn-primary">コメント</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ $news_comment['news']['updated_at']->format('Y年m月d日') }}</p>
                            <p class="body mx-auto">{{ str_limit($news_comment['news']['body'], 650) }}</p>
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
                            @if(!is_null($news_comments))
                                <div class="news_comments col-md-11 mx-auto">
                                    @foreach ($news_comment['comments'] as $comment)
                                        <h6>{{ $comment['nickname'] }}</h6>
                                        <h6>{{ $comment['comment'] }}</h6>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            <hr color="#c0c0c0">
        @endforeach
            
        <div class="row">
            <div class="news col-md-8 mx-auto mt-3">
                @foreach($news_comments as $news_comment)
                    <div class="headline">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    <p>{{ $news_comment['news']['updated_at']->format('Y年m月d日') }}</p>
                                </div>
                                <div class="title">
                                    {{ str_limit($news_comment['news']['title'], 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($news_comment['news']['body'], 1500) }}
                                </div>
                            </div>
                           <div class="image col-md-6 text-right mt-4">
                                @if ($news_comment['news']['image_path'])
                                    <img src="{{ $news_comment['news']['image_path'] }}">
                                @endif
                            </div>
                            <a href="{{ url('/admin/' . $news_comment['news']['id']) }}" role="button" class="btn btn-primary">コメント</a>
                        </div>
                        <div class="news_comments p=1">
                            <div class="cp_box">
                                <input id="cp01" type="checkbox"/>
                                <label for="cp01">続きを読むテスト</label>
        	                        <div class="cp_container">
                                        <h3>コメント一覧</h3>
                                        @if(!is_null($news_comments))
                                            <div class="news_comments p=1">
                                                @foreach ($news_comment['comments'] as $comment)
                                                    <h6>{{ $comment['nickname'] }}</h6>
                                                    <h6>{{ $comment['comment'] }}</h6>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <hr color="#c0c0c0">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection