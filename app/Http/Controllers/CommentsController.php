<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;
use App\User;
use App\Comments;

class CommentsController extends Controller
{
    public function store(Request $request, Products $product, User $user)
    {
        $this->validate($request, [
            "message" => "required|min:10|max:255",
            "rating" => "required|min:0|max:5"
        ]);

        $comment = Comments::create([
            "user_id" => $user->id,
            "commentable_id" => $product->id,
            "commentable_type" => "App\Products",
            "message" => $request->get("message"),
            "rating" => $request->get("rating")
        ]);

        $product->rating = Comments::where('commentable_id', $product->id)->avg('rating');
        $product->save();

        $message = $comment ? "gracias por tu opinón." : "lo sentimos, tu opinión no pudo añadirse.";
        return redirect()->route("product-detail", $product->slug)->with("message", $message);           
    }
}