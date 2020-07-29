@extends('layouts.front')
@section('title', 'ニュース検索')

<div class="front mx-auto">
    <div class="container">
        <hr color="#c0c0c0">
            <body>
            <h2>ニュース検索結果</h2>
            <p>検索キーワード：{{$news_word}}</p> 
            <div class="row">
                <div class="search_list-news col-md-12 mx-auto">
                    <div class="row">
                        @if(!$word_posts->isEmpty())
                        <table>
                            <tr>
                                <th width="12%">日時</th>
                                <th width="20">タイトル</th>
                                <th width="75%">本文</th>
                            </tr>
                            @foreach($word_posts as $news) 
                                <tr>
                                    <td>{{$news->updated_at->format('Y年m月d日')}}</td>
                                    <td>{{ \Str::limit($news->title,100)}}</td>
                                    <td>{{ \Str::limit($news->body,300) }}</td>
                                </tr>  
                            @endforeach
                    </div>
                </div>
            </div>
                            
                        @else
                            <p>該当するニュースは存在しません</p>
                            <h2>ニュース検索</h2>
                            <form action="{{ action('NewsController@news_research') }}" method="get">
                                <input type="text" name="news_word"placeholder="検索キーワードを入力">
                                <input type="submit" class="btn btn-primary" value="検索">
                            </form>
                        @endif
    </div>
</div>    