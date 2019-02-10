@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('body')
@section('admin_body')

<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
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

					<form method="POST" action="/menu/{{ $edit_game->id }}/edit" enctype="multipart/form-data">
						<h2>Edit Game</h2>
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" id="title" class="form-control" value="{{$edit_game->title}}">
					</div>

					<div class="form-group">
						<label>Developer</label>
						<textarea name="developer" id="developer" class="form-control">{{$edit_game->developer}}</textarea>
					</div>

					<div class="form-group">
						<label>Date Released</label>
						<input type="month" name="date_released" id="date_released" class="form-control" value="{{$edit_game->date_released}}">
					</div>

					<div class="form-group">
						<label>Content</label>
						<textarea type="text" name="content" id="content" class="form-control">{{$edit_game->content}}</textarea>
					</div>

					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="image_path" id="image_path" class="form-control">
					</div>

					<div class="form-group">
						<label>Genre</label>
						<select type="number" name="genres" id="genres">
							@foreach($genres as $genre)
								@if($edit_game->genre_id == $genre->id)
									<option value="{{$genre->id}}" selected>{{$genre->name}}</option>
								@else
									<option value="{{$genre->id}}">{{$genre->name}}</option>
								@endif
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