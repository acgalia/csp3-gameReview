@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('body')

@section('admin_body')



	@if($errors->any())
		<ul class="list-unstyled">
			@foreach($errors->all() as $error)
			<li>
				<div class="alert alert-danger">{{ $error }}</div>
			</li>
			@endforeach
		</ul>				
	@endif

	<form method="POST" action="/review/{{$edit_review->id}}/edit" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}		
		@foreach($edit_review->games as $game)
		Game_id {{$game->id}} | Review_id {{$edit_review->id}}
			<input type="hidden" name="gameid" id="gameid" value="{{$game->id}}">	
			<input type="hidden" name="rating" id="rating" value="{{$game->pivot->rating}}">
			<div class="form-group">
				<label>Comment</label>
				<textarea class="form-control" id="comment" name="comment">{{$game->pivot->comment}}</textarea>
			</div>
		@endforeach
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
	<a href="/menu/{{$game->id}}" class="btn btn-primary">Back</a>





@endsection