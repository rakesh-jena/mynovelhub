<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookOriginal;
use App\Models\BookTranslated;
use App\Models\ChapterTranslation;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\BookGenre;
use App\Models\BookTag;
use App\Models\UserLike;
use App\Models\UserComment;
use App\Models\UserReply;
use App\Models\UserReview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\ChapterView;
use App\Models\UserHistory;
use Cookie;
use App\Models\ViewCount;

class WebpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $latest_ch = ChapterTranslation::orderBy('created_at', 'desc')->limit(15)->get();
        $new_books = BookTranslated::latest()->limit(16)->get();
        $comp_books = BookTranslated::where('status', 'complete')->limit(12)->get();
        $pop_books = BookTranslated::orderBy('page_view', 'desc')->limit(12)->get();
        $featured_books = BookTranslated::where('featured', true)->limit(6)->get();

        return view('webpage.homepage', compact('latest_ch', 'new_books', 'pop_books', 'featured_books', 'comp_books'));
    }

    public function book_info($slug, $id)
    {
        $book = BookTranslated::where('id', $id)->first();
        $book->update([
            'page_view' => $book->page_view + 1,
        ]);

        $views = ViewCount::where('book_id', $book->id)->first();
        if($views){
            $views->update([
                'daily' => $views->daily + 1,
                'weekly' => $views->weekly + 1,
                'monthly' => $views->monthly + 1
            ]);
        } else {
            $views = new ViewCount();
            $views->daily = 1;
            $views->weekly = 1;
            $views->monthly = 1;
            $views->book_id = $book->id;

            $views->save();
        }
        
        $chapters = DB::table('chapters_translation')->where('book_id', $id)->select('id', 'ch_name','slug', 'chapter_no', 'volume', 'updated_at')->orderBy('chapter_no', 'asc')->get();

        $genre_id = BookGenre::where('book_id', $id)->where('book_type', 'translation')->get();
        $tag_id = BookTag::where('book_id', $id)->where('book_type', 'translation')->get();
        $g_list = [];
        foreach($genre_id as $g)
        {
            $genre = Genre::where('id', $g->genre_id)->first();
            $g_list[] = [
                'id' => $genre->id,
                'genre' => $genre->genre,
                'book_genre_id' => $g->id
            ];
        }

        $t_list = [];
        foreach($tag_id as $t)
        {
            $tag = Tag::where('id', $t->tag_id)->first();
            $t_list[] = [
                'id' => $tag->id,
                'tag' => $tag->tag,
                'book_tag_id' => $t->id
            ];
        }

        $reviews = UserReview::where('book_id', $id)->get();
        $user_review = null;
        $history = null;
        
        if(Auth::check()){            
            $history = UserHistory::where('user_id', Auth::id())->where('book_id', $id)->first();
        }
        
        return view('webpage.book_single', compact('book', 'chapters', 'g_list', 't_list', 'reviews', 'history'));
    }

    public function chapter($book_slug, $id, $chapter_slug)
    {
        $chapter = ChapterTranslation::where('id', $id)->first();
        $book = BookTranslated::where('id', $chapter->book_id)->first();
        $book->update([
            'page_view' => $book->page_view + 1,
        ]);
        
        $chapters_list = DB::table('chapters_translation')->where('book_id', $chapter->book_id)->select('id', 'ch_name','slug', 'chapter_no', 'volume', 'updated_at')->orderBy('chapter_no', 'asc')->get();

        $next = ChapterTranslation::where('book_id', $chapter->book_id)->where('chapter_no', $chapter->chapter_no+1)->select('id', 'ch_name','slug', 'chapter_no')->first();
        $previous = ChapterTranslation::where('book_id', $chapter->book_id)->where('chapter_no', $chapter->chapter_no-1)->select('id', 'ch_name','slug', 'chapter_no')->first();
        
        $comments = UserComment::where('chapter_id', $chapter->id)->where('chapter_type', 'translation')->get();
        
        if(Auth::check()){
            $user = Auth::user();
            $history = UserHistory::where('user_id', $user->id)->where('book_id', $book->id)->first();
            if($history){
                $history->update([
                    'chapter_id' => $chapter->id,
                ]);
            } else {
                $history = new UserHistory();
                $history->user_id = $user->id;
                $history->book_id = $book->id;
                $history->chapter_id = $chapter->id;
                $history->save();
            }
        }

        $ch_views = ChapterView::where('chapter_id', $chapter->id)->first();
        $views = ViewCount::where('book_id', $chapter->book_id)->first();

        if($ch_views){
            $ch_views->update([
                'views' => $ch_views->views + 1
            ]);
        } else {
            $ch_views = new ChapterView();
            $ch_views->chapter_id = $chapter->id;
            $ch_views->views = 1;
            $ch_views->book_id = $chapter->book_id;

            $ch_views->save();
        }

        if($views){
            $views->update([
                'daily' => $views->daily + 1,
                'weekly' => $views->weekly + 1,
                'monthly' => $views->monthly + 1
            ]);
        } else {
            $views = new ViewCount();
            $views->daily = 1;
            $views->weekly = 1;
            $views->monthly = 1;
            $views->book_id = $chapter->book_id;

            $views->save();
        }

        if(array_key_exists('font_size', $_COOKIE) == false){
            setcookie('font_size', '18px', time() + (86400 * 30), "/");
        }
        if(array_key_exists('font_family', $_COOKIE) == false){
            setcookie('font_family', 'Mulish', time() + (86400 * 30), "/");
        }
        if(array_key_exists('dark_mode', $_COOKIE) == false){
            setcookie('dark_mode', 'inactive', time() + (86400 * 30), "/");
        }
        
        return view('webpage.chapter', compact('chapter', 'book', 'chapters_list', 'comments', 'next', 'previous'));
    }

    public function all_novels(Request $request)
    {
        $books = BookTranslated::orderByDesc('page_view')->paginate(16);
        if($request->isMethod('post')){
            session(['filter_status' => $request->input('status')]);
            session(['filter_order' => $request->input('orderBy')]);

            if($request->filled('status')){
                $books = BookTranslated::where('status', $request->input('status'))
                ->orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            } else {
                $books = BookTranslated::orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            }
        }
        return view('webpage.book_listing', compact('books'));
    }

    public function all_genre()
    {
        $genres = Genre::orderBy('genre', 'asc')->get();
        
        return view('webpage.genre_listing', compact('genres'));
    }
    
    public function all_tags()
    {
        $tags = Tag::orderBy('tag', 'asc')->paginate(50);
        
        return view('webpage.tag_listing', compact('tags'));
    }
    
    public function genre_books(Request $request, $id, $slug)
    {
        $genre = Genre::where('id', $id)->first();
        $ids = BookGenre::where('genre_id', $id)->select('book_id')->get()->pluck('book_id')->all();
        $books = BookTranslated::whereIn('id', $ids)->orderBy('page_view', 'desc')->paginate(16);

        if($request->isMethod('post')){
            session(['filter_status' => $request->input('status')]);
            session(['filter_order' => $request->input('orderBy')]);

            if($request->filled('status')){
                $books = BookTranslated::whereIn('id', $ids)->where('status', $request->input('status'))
                ->orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            } else {
                $books = BookTranslated::whereIn('id', $ids)->orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            }
        }
        return view('webpage.book_listing', compact('books', 'genre'));
    }

    public function novels_by_tag(Request $request, $id, $slug)
    {
        $tag = Tag::where('id', $id)->first();
        $ids = BookTag::where('tag_id', $id)->select('book_id')->get()->pluck('book_id')->all();
        $books = BookTranslated::whereIn('id', $ids)->orderBy('page_view', 'desc')->paginate(16);

        if($request->isMethod('post')){
            session(['filter_status' => $request->input('status')]);
            session(['filter_order' => $request->input('orderBy')]);

            if($request->filled('status')){
                $books = BookTranslated::whereIn('id', $ids)->where('status', $request->input('status'))
                ->orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            } else {
                $books = BookTranslated::whereIn('id', $ids)->orderBy($request->input('orderBy'), 'desc')
                ->paginate(16);
            }
        }
        return view('webpage.book_listing', compact('books', 'tag'));
    }
    
    public function extra()
    {
        $ch_views = ChapterView::get();
        // foreach($ch_views as $chv){
        //     $book_id = ChapterTranslation::where('id', $chv->chapter_id)->select('book_id')->first();
        //     $ch_view = ChapterView::where('id', $chv->id)->first();
        //     $ch_view->update([
        //         'book_id' => $book_id->book_id
        //     ]);
        // }
        return $ch_views;
    }
}
