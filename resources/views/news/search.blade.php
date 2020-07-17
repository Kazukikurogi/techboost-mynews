<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>ニュース検索</title>

<body>
<h2>ニュース検索結果</h2>
<p>検索キーワード：{{$news_word}}</p> 

@if(!$word_posts->isEmpty())
<table>
    <tr><th>タイトル</th><th>本文</th><th>日時</th></tr>
    @foreach($word_posts as $news) 
        <tr>
            <td>{{$news->title}}</td>
            <td>{{$news->body}}</td>
            <td>{{$news->updated_at->format('Y年m月d日')}}</td>
        </tr>  
    @endforeach
@else
<p>該当するニュースは存在しません</p>
<h2>ニュース検索</h2>
<form action="{{ action('NewsController@store_search') }}" method="get">
    <input type="text" name="news_word"placeholder="検索キーワードを入力">
    <input type="submit" class="btn btn-primary" value="検索">
</form>
@endif