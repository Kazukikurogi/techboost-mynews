@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                   <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <select name="gender" id="gender">
                                <option disabled selected value>選択して下さい</option>
                                @foreach (["男性","女性","その他"] as $key => $val)
                                @if($request->gender ==$val->gender) || old(gender) == $profile_form->gender )
                                    <option
                                        class="form-control"
                                        value="{{ $val->gender }}" selected>{{ $val->gender }}
                                    </option>
                                @else
                                    <option
                                        class="form-control"
                                        value="{{ $val->gender }}">{{ $val->gender}}</option>
                                @endif    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for=hobby>趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                 {{-- 以下を追記　--}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->profile_histories != NULL)
                                @foreach ($profile_form->profile_histories as $profile_histories)
                                    <li class="list-group-item">{{ $profile_histories->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
            </div>
        </div>
    </div>
@endsection

