@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('body')
@section('admin_body')

@foreach($reviews as $review)
@foreach($review->games as $game_review)
	<ul>
		<li>{{$review->id}} - {{$review->user->username}} - {{$game_review->pivot->rating}} - {{$game_review->pivot->comment}}</li>
	</ul>
@endforeach
@endforeach


@endsection