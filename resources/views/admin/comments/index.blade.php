@extends('layouts.front')
@section('content')

<div class="col-xs-8 col-xs-offset-2">

<h3>コメント一覧</h3>
@foreach($post->comments as $single_comment)
	<h4>{{ $single_comment->commenter }}</h4>
	<p>{{ $single_comment->comment }}</p><br />
@endforeach

</div>

@stop