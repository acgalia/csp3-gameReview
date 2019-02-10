@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('body')
@section('admin_body')

<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">

			<h2>Genre</h2>
			@foreach ($genres as $genre)
				<ul>
					<li>{{$genre->name}}</li>
				</ul>
			@endforeach

			<div class="row">
				<div class="col">
					@foreach ($games as $game)
						<div class="card card-block text-center my-5">
						  <div class="card-header">
						    {{$game->genre->name}}
						  </div>
						  <div class="card-body">
						  	<img class="card-img-top" src="{{$game->image_path}}" alt="Card image cap">
						    <h5 class="card-title">{{$game->title}} ({{$game->date_released}})</h5>
						    <h4 class="card-title">{{$game->developer}}</h4>
						    <a href="/menu/{{ $game->id }}" class="btn btn-dark">More Info</a>
						    
						  </div>
						  <div class="card-footer text-muted">
						  	<div class="row">
						  		<div class="col-lg-4">
						  			Average of stars
						  		</div>
						  		<div class="col-lg-4">
						  			Total count of reviews
						  		</div>
						  		<div class="col-lg-4">
						  			Posted {{$game->created_at->diffForHUmans()}}
						  		</div>
						  	</div>
						  </div>
						</div>						
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
</div>







@endsection