@extends('web')
@section('title', 'MyNovelHub')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<div class="profile-wrapper container mt-md-5 mb-md-5 mt-2 mb-2">
    <div class="profile-panel">
        <div class="profile-content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @foreach($books as $library)
                                @php
                                $book = App\Models\BookTranslated::where('id', $library->book_id)->first();
                                $history = App\Models\UserHistory::where('user_id', $user->id)->where('book_id', $library->book_id)->first();
                                if($history){
                                    $chapter = App\Models\ChapterTranslation::where('id', $history->chapter_id)->select('id','chapter_no','slug')->first();
                                } else {
                                    $chapter = App\Models\ChapterTranslation::where('book_id', $book->id)->where('chapter_no', 1)->select('id','chapter_no','slug')->first();
                                }
                                @endphp
<<<<<<< HEAD
                                <div class="library-item col-2">
=======
                                <div class="library-item col-6 col-sm-3 col-md-2">
>>>>>>> 0d5fa8a9ad8559fc532c67c0035779098fd7dae2
                                    <div class="library-book-cover mb-2">
                                        <a href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}">
                                            <img alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/150/'.$book->cover) }}">
                                        </a>
                                    </div>
                                    <h6 class="book-title">
                                        <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                            {{ $book->novel }}
                                        </a>
                                    </h6>
                                    <p class="book-progress">
                                        @php
                                        if($history)
                                            echo 'Progress '.$chapter->chapter_no.'/'.$book->chapters;
                                        else {
                                            echo 'Progress 0/'.$book->chapters;
                                        }    
                                        @endphp
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection