<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Post\CommentFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\ReponseFromRequest;
use App\Models\Post\Comment;
use App\Models\Post\Reponse;
use App\Models\Post\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::latest()->paginate(12);

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    function show(Post $post)
    {

        return view('post.show', [
            'post' => $post
        ]);
    }

    function storeComment(CommentFormRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post->id;

        if (Comment::create($data)) {
            return back()->with('success', 'Votre commentaire à bien été poste');
        } else {
            return back()->with('error', 'Une erreur est survenue');
        }
    }

    function reponse(Comment $comment)
    {

        return view('post.comment', ['comment' => $comment]);
    }


    function storeReponse(ReponseFromRequest $request, Comment $comment)
    {

        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['comment_id'] = $comment->id;

        if (Reponse::create($data)) {
            return back()->with('success', 'Votre reponse au commentaire de ' . $comment->user->name . ' à bien été postée');
        } else {
            return back()->with('error', 'Une erreur est survenue');
        }
    }

    function filterByTag(Tag $tag){
        return view('post.index',[
            'posts' => $tag->posts()->latest()->paginate(12),
        ]);
    }
}
