<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Game;
use App\User;
use App\Review;
use Auth;

class UserController extends Controller
{
    public function showMenu(){
    	$genres = Genre::all();
    	$games = Game::all();
    	// dd($genres);
    	return view('/users.menu', compact('genres', 'games'));
    }

    public function showGame($id){
    	$show_game = Game::find($id);
        $reviews = Review::all();

        return view('/users.game', compact('show_game', 'reviews'));  


        // $reviews = Review::where('game_id', $id)->get();
    	
    }

    public function reviewGame($gameid, Request $request){
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->save();

        $review->games()->attach($gameid, ['review_id'=>$review->id, 'rating' => $request->rating, 'comment' => $request->comment]);     
        return redirect("/menu/$gameid");
    }

    public function showComment(){
        $reviews = Review::all();
        // dd($reviews);
        return view ('/users.comment', compact('reviews'));
    }

    public function deleteReview($id){
        $delete_review = Review::find($id);
    }

    public function editReview($id){
        $edit_review = Review::find($id);
        // foreach($edit_review->games as $game){
            return view('/users.editReview', compact('edit_review'));
        // }

    }

    public function updateReview($id, Request $request){
        $update_review = Review::find($id);
        // foreach($update_review->games as $game){
            
                // $rules = array(
                //     'comment' => 'required',
                //     'gameid' => 'required'
                // );

                // $this->validate($request, $rules);
                $gameid = $request->gameid;
                $update_review->games()->updateExistingPivot($gameid, ['comment' => $request->comment]);

                

                // $game()withPivot->comment = $request->comment;
            
        // }

            // $update_review ->save();
            return redirect('/menu/'. $gameid);

       

        // $update_review->games()->attach('$game_id', ['review_id' => $id, 'rating'=> $request->rating, 'comment' => $request->comment]);
        // $update_review->save();

        // return redirect('/users.game'.$id);
        
    }

}
