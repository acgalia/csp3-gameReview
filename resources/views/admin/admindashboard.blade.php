@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('admin_body')

	<div class="container">

		{{-- @if(Session::has("game_added"))
			<div class="alert alert-success">
				{{ Session::get('game_added') }}	
			</div>
		@endif --}}

		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10 p-5">
				<div class="card p-5">
					@if($errors->any())
					<ul class="list-unstyled">
						@foreach($errors->all() as $error)
						<li>
							<div class="alert alert-danger">{{ $error }}</div>
						</li>
						@endforeach
					</ul>				
					@endif

					<form method="POST" action="/addgame" enctype="multipart/form-data">
						<h2>Add Game</h2>
					{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>

					<div class="form-group">
						<label>Developer</label>
						<textarea name="developer" id="developer" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>Date Released</label>
						<input type="month" name="date_released" id="date_released" class="form-control">
					</div>

					<div class="form-group">
						<label>Content</label>
						<textarea type="text" name="content" id="content" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="image_path" id="image_path" class="form-control">
					</div>

					<div class="form-group">
						<label>Genre</label>
						<select name="genre" id="genre">
							@foreach($genres as $genre)
							<option value="{{ $genre->id }}">{{ $genre->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>

				</form>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>

	</div>

@endsection