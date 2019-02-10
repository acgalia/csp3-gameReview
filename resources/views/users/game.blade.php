@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('body')
@section('admin_body')

<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<div class="card card-block my-5">
			  <img class="card-img-top" src="/{{$show_game->image_path}}" alt="Card image cap">
			  <div class="card-body">
			  	<h3>Title: {{$show_game->title}}</h3>
			  	<h5>Developer: {{$show_game->developer}}</h5>
			  	<h5>Date Released: {{$show_game->date_released}}</h5>
			    <p class="card-text text-justify">{{$show_game->content}}</p>
			    	@if(Auth::user()->admin == "1")
				    	<div class="row">
				    		<div class="col-lg-6">
				    			<form method="GET" action="/menu/{{$show_game->id}}/edit">
									{{csrf_field()}}
									{{method_field('EDIT')}}
									<button type="submit" class="btn btn-dark form-control">Edit</button>												
								</form>	
				    		</div>		    		
				    		<div class="col-lg-6">
				    			<a href="" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal">Delete</a>
				    		</div>		    		
				    	</div>
			    	@endif
			  </div>
			  <div class="card-footer">
			  	<div class="row py-3">
			  		<div class="col-lg-8"></div>
			  		<div class="col-lg-2">
			  			<a href="" data-toggle="modal" data-target="#reviewModal" class="btn btn-dark">Submit a Review</a>
			  		</div>
			  		<div class="col-lg-2">
			  			<a href="/menu" class="btn btn-dark text-center">Back to Menu</a>
			  		</div>
			  	</div>
			  	<div class="row my-3">
			  		<div class="col-lg-10">
			  			<p>Comments section</p>
			  			@foreach($reviews as $review)			  		
			  			@foreach($review->games as $game)
				  			@if($game->pivot->game_id == $show_game->id)
					  			<ul>
					  				<li>{{$game->pivot->comment}} <small>{{$game->pivot->created_at->diffForHUmans()}} by: {{$review->user->username}}</small>
					  					@if(Auth::user()->id == $review->user_id)

					  						<form method="GET" action="/review/{{$review->id}}/edit">
								  				<p><button type="submit" class="btn btn-dark">Edit</button></p>
								  				{{-- <p><button type="submit" class="btn btn-dark">Delete</button></p> --}}
							  				</form>
					  					@endif
					  				</li>
					  			</ul>
				  			@else
				  			@endif
			  			@endforeach
			  			@endforeach
			  		</div>
			  	</div>
			  </div>
			</div>

			{{-- Delete Modal --}}
			<div id="deleteModal" class="modal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Delete Game</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Do you want to delete {{ $show_game->title }}</p>
			      </div>
			      <div class="modal-footer">
			      	<form method="POST" action="/menu/{{ $show_game->id }}/delete">
			      		{{ csrf_field() }}
						{{ method_field('DELETE') }}
			        	<button type="submit" class="btn btn-danger">Confirm</button>			      		
			        </form>
			      </div>
			    </div>
			  </div>
			</div>

			{{-- Review Modal --}}
			<div id="reviewModal" class="modal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			  	<form method="POST" action="/submitReview/{{ $show_game->id }}">
				      	{{csrf_field()}}
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Please rate this game</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="rate">
						    <input type="radio" id="star5" name="rating" value="5" />
						    <label for="star5" title="text">5 stars</label>
						    <input type="radio" id="star4" name="rating" value="4" />
						    <label for="star4" title="text">4 stars</label>
						    <input type="radio" id="star3" name="rating" value="3" />
						    <label for="star3" title="text">3 stars</label>
						    <input type="radio" id="star2" name="rating" value="2" />
						    <label for="star2" title="text">2 stars</label>
						    <input type="radio" id="star1" name="rating" value="1" />
						    <label for="star1" title="text">1 star</label>
						</div>

						<textarea class="form-control" placeholder="Type in your comments" id="comment" name="comment"></textarea>
				      </div>
				      <div class="modal-footer">
				        	<button type="submit" class="btn btn-dark">Submit</button>			      					        
				      </div>			      
				   	</div>
			   	</form>
			  </div>
			</div>

		</div>
		<div class="col-lg-1"></div>
	</div>
</div>

@endsection