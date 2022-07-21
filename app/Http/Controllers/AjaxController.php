<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookOriginal;
use App\Models\BookTranslated;
use App\Models\Genre;
use App\Models\BookGenre;
use App\Models\Tag;
use App\Models\BookTag;
use Illuminate\Support\Facades\DB;
use App\Models\UserReview;
use App\Models\UserLike;
use App\Models\UserComment;
use App\Models\UserReply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function genre_search(Request $request)
    {
        $result = Genre::where('genre', 'LIKE', "%{$request->input('search')}%")->orderBy('genre', 'asc')->get(); 

        return $result;
    }

    public function add_genre(Request $request)
    {
        $genre = BookGenre::firstOrCreate([
            'book_id' => $request->book_id,
            'book_type' => $request->book_type,
            'genre_id' => $request->add
        ],[
            'book_id' => $request->book_id,
            'book_type' => $request->book_type,
            'genre_id' => $request->add
        ]);

        $result = BookGenre::where('book_id', $request->book_id)->where('book_type', $request->book_type)->get();
        $g_list = [];
        foreach($result as $g)
        {
            $genre = Genre::where('id', $g->genre_id)->first();
            $g_list[] = [
                'id' => $genre->id,
                'genre' => $genre->genre,
                'book_genre_id' => $g->id
            ];
        }

        return $g_list;        
    }

    public function delete_genre(Request $request)
    {
        $gd = BookGenre::where('id', $request->delete_id);
        $gd->delete();

        $result = BookGenre::where('book_id', $request->book_id)->where('book_type', $request->book_type)->get();
        $g_list = [];
        foreach($result as $g)
        {
            $genre = Genre::where('id', $g->genre_id)->first();
            $g_list[] = [
                'id' => $genre->id,
                'genre' => $genre->genre,
                'book_genre_id' => $g->id
            ];
        }

        return $g_list;
    }

    public function tag_search(Request $request)
    {
        $result = Tag::where('tag', 'LIKE', "%{$request->input('search')}%")->orderBy('tag', 'asc')->get(); 

        return $result;
    }

    public function add_tag(Request $request)
    {
        $tag = BookTag::firstOrCreate([
            'book_id' => $request->book_id,
            'book_type' => $request->book_type,
            'tag_id' => $request->add
        ],[
            'book_id' => $request->book_id,
            'book_type' => $request->book_type,
            'tag_id' => $request->add
        ]);

        $result = BookTag::where('book_id', $request->book_id)->where('book_type', $request->book_type)->get();
        $t_list = [];
        foreach($result as $g)
        {
            $tag = Tag::where('id', $g->tag_id)->first();
            $t_list[] = [
                'id' => $tag->id,
                'tag' => $tag->tag,
                'book_tag_id' => $g->id
            ];
        }

        return $t_list; 
    }

    public function delete_tag(Request $request)
    {
        $td = BookTag::where('id', $request->delete_id);
        $td->delete();

        $result = BookTag::where('book_id', $request->book_id)->where('book_type', $request->book_type)->get();
        $t_list = [];
        foreach($result as $g)
        {
            $tag = Tag::where('id', $g->tag_id)->first();
            $t_list[] = [
                'id' => $tag->id,
                'tag' => $tag->tag,
                'book_tag_id' => $g->id
            ];
        }

        return $t_list;
    }

    public function add_review(Request $request)
    {
        $review = UserReview::where('user_id', Auth::id())->where('book_id', $request->book_id)->where('book_type', $request->input('book_type'))->first();
        if(!$review){
            $review = new UserReview();
            $review->user_id = Auth::id();
            $review->book_id = $request->input('book_id');
            $review->book_type = $request->input('book_type');
            $review->rating = $request->input('rating');
            $review->content = $request->input('content');
    
            $review->save();
    
            $book_rating = UserReview::where('book_id', $request->input('book_id'))->where('book_type', $request->input('book_type'))->avg('rating');
            $update_rating = BookTranslated::where('id', $request->input('book_id'))->first()->update([
                'rating' => $book_rating,
            ]);
        }        

        return $review;
    }

    public function edit_review(Request $request)
    {
        $update_review = UserReview::where('id', $request['id'])->first()->update([
            'rating' => $request['rating'],
            'content' => $request['content']
        ]);
        $book_rating = UserReview::where('book_id', $request->input('book_id'))->where('book_type', $request->input('book_type'))->avg('rating');
        $update_rating = BookTranslated::where('id', $request->input('book_id'))->first()->update([
            'rating' => $book_rating,
        ]);

        $review = UserReview::where('id', $request['id'])->first();

        return $review;
    }

    public function add_comment(Request $request)
    {
        $comment = new UserComment();
        $comment->user_id = $request->input('user_id');
        $comment->chapter_id = $request->input('chapter_id');
        $comment->chapter_type = $request->input('chapter_type');
        $comment->content = $request->input('content');

        $comment->save();

        return redirect()->to($request['cur_url']);
    }

    public function edit_comment(Request $request)
    {
        $update_comment = UserComment::where('id', $request['id'])->first()->update([
            'content' => $request['content']
        ]);

        $comment = UserComment::where('id', $request['id'])->first();

        return $comment;
    }

    public function add_like(Request $request)
    {
        $like = new UserLike();
        $like->user_id = $request->input('user_id');
        $like->liked_id = $request->input('liked_id');
        $like->liked_type = $request->input('liked_type');

        $like->save();
        $likes = UserLike::where('liked_type', $request->input('liked_type'))->where('liked_id', $request->input('liked_id'))->count();
        return $likes;
    }

    public function edit_like(Request $request)
    {
       
    }

    public function add_reply(Request $request)
    {
        $reply = new UserReply();
        $reply->user_id = $request->input('user_id');
        $reply->replied_id = $request->input('replied_id');
        $reply->reply_type = $request->input('reply_type');
        $reply->content = $request->input('content');

        $reply->save();

        return redirect()->to($request['cur_url']);
    }

    public function view_replies(Request $request)
    {
        $replies = UserReply::where('reply_type', $request['reply_type'])->where('replied_id', $request['replied_id'])->get();
        $result = [];
        foreach($replies as $reply)
        {
            $user = User::where('id', $reply->user_id)->first();
            $likes = UserLike::where('liked_type', 'user_reply')->where('liked_id', $reply->id)->count();
            $liked = false;
            if(Auth::check())
            $liked = UserLike::where('liked_type', 'user_reply')->where('liked_id', $reply->id)->where('user_id', Auth::user()->id)->first();
            $result[] = [
                'username' => $user->name,
                'time' => Carbon::parse($reply->created_at)->diffForHumans(),
                'content' => $reply->content,
                'likes' => $likes,
                'liked' => $liked,
            ];            
        }

        return $result;
    }

    public function edit_reply(Request $request)
    {
        $update_reply = UserReply::where('id', $request['id'])->first()->update([
            'content' => $request['content']
        ]);

        $reply = UserReply::where('id', $request['id'])->first();

        return $reply;
    }

    public function search(Request $request)
    {
        $result = BookTranslated::where('novel', 'LIKE', "%{$request->input('search')}%")->orderBy('novel', 'asc')->limit(10)->get();

        return $result;
    }
}