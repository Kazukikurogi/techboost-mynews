@extends('layouts.profile')
@section('title', 'コメント投稿')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント</h2>
                <form action="{{ action('Admin\CommentsController@add') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="nickname">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="comment">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" value="{{ old('comment') }}" rows="20"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="コメント投稿"