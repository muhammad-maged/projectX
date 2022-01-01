<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Movie;
use App\UserReview;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MoviesController extends Controller
{

    public function addMovie(Request $request)
    {
        $data = $request->all();

        $movie = new Movie();
        $movie->name =$data['name'];
        $movie->director =$data['director'];
        $movie->cast = json_encode($data['cast']);
        $movie->release_date = $data['release_date'];

        $movie->save();

        return response()->json(["message" => "created"],201);
    }

    public function editMovie(Request $request)
    {
        $data = $request->all();

        $movie = Movie::find($data['id']);

        if (!$movie)
            return response()->json(["message" => "not found"],404);

        $movie->name =$data['name'];
        $movie->director =$data['director'];
        $movie->cast = json_encode($data['cast']);
        $movie->release_date = $data['release_date'];

        $movie->save();

        return response()->json(["message" => "updated"],200);
    }

    public function getMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie)
            return response()->json(["message" => "not found"],404);

        return response()->json(MovieResource::make($movie),200);
    }

    public function getMovies()
    {
        $movies = Movie::all();

        return response()->json(MovieResource::collection($movies),200);
    }

    public function deleteMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie)
            return response()->json(["message" => "not found"],404);

        $movie->delete();

        return response()->json(["message" => "deleted"],200);
    }

    public function addUserReview(Request $request)
    {
        $data = $request->all();

        $movie = Movie::find($data['movie_id']);

        if (!$movie)
            return response()->json(["message" => "not found"],404);

        $userReview = new UserReview();
        $userReview->user_name = $data['user_name'];
        $userReview->review = $data['review'];
        $userReview->rate = $data['rate'];
        $userReview->movie_id = $data['movie_id'];
        $userReview->save();

        return response()->json(["data" => $userReview, "message" => "created"],201);
    }

    public function getMovieReviews($movieId)
    {
        $movie = Movie::find($movieId);

        if (!$movie)
            return response()->json(["message" => "not found"],404);

        return response()->json($movie->userReviews,200);

    }

    public function editMovieReview(Request $request)
    {
        $data = $request->all();

        $review = UserReview::find($data['id']);

        if (!$review)
            return response()->json(["message" => "not found"],404);

        $review->review = $data['review'];
        $review->rate = $data['rate'];
        $review->save();

        return response()->json(["data" => $review, "message" => "created"],201);
    }

    public function deleteMovieReview($id)
    {
        $userReview = UserReview::find($id);

        if (!$userReview)
            return response()->json(["message" => "not found"],404);

        $userReview->delete();

        return response()->json(["message" => "deleted"],200);
    }
}
