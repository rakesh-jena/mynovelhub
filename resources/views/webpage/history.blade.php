@extends('web')
@section('title', 'MyNovelHub')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<div class="profile-wrapper container mt-md-5 mb-md-5 mt-3 mb-2">
    <div class="profile-panel">
        <div class="profile-content-wrapper">
            @foreach($histories as $history)
                @php
                $book = App\Models\BookTranslated::where('id', $history->book_id)->first();
                $chapter = App\Models\ChapterTranslation::where('id', $history->chapter_id)->select('id','chapter_no','slug')->first();
                $library = App\Models\UserLibrary::where('user_id', Auth::id())->where('book_id', $history->book_id)->first();
                @endphp
                <div class="history-item  mb-3">
                    <div class="row">
<<<<<<< HEAD
                        <div class="col-12">
                            @foreach($histories as $history)
                                @php
                                $book = App\Models\BookTranslated::where('id', $history->book_id)->first();
                                $chapter = App\Models\ChapterTranslation::where('id', $history->chapter_id)->select('id','chapter_no','slug')->first();
                                $library = App\Models\UserLibrary::where('user_id', Auth::id())->where('book_id', $history->book_id)->first();
                                @endphp
                                <div class="history-item  mb-3">
                                    <div class="row">
                                        <div class="history-book-cover col-2">
                                            <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                <img alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/150/'.$book->cover) }}">
                                            </a>
                                        </div>
                                        <div class="history-details col-10">
                                            <h4 class="book-title">
                                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                    {{ $book->novel }}
                                                </a>
                                            </h4>
                                            <div class="book-star">
                                                <ul class="stars-list" style="font-size: 0.9rem">
                                                    @php
                                                    for($i = 0; $i<$book->rating; $i++)
                                                    echo("<li class='star-item active'><i class='mdi mdi-star'></i></li>");
                                                    if($book->rating<5){
                                                        $r = 5 - $book->rating;
                                                        for($i = 0; $i<$r; $i++)
                                                        echo("<li class='star-item inactive'><i class='mdi mdi-star'></i></li>");
                                                    }
                                                    echo("<li class='star-item'><i class=''></i>(".$book->rating.")</li>")
                                                    @endphp
                                                </ul>
                                            </div>
                                            <div class="book-desc">
                                                {{ $book->description }}
                                            </div>
                                            <div class="history-progress">
                                                <div class="book-progress d-inline-block">
                                                    @php
                                                    echo 'Progress '.$chapter->chapter_no.'/'.$book->chapters;                                               
                                                    @endphp
                                                </div>
                                                <div class="history-actions d-inline-block float-right">
                                                    <ul class="p-0">
                                                        <li class="d-inline-block"><a href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}" class="btn btn-gradient-primary btn-rounded">Continue Reading</a></li>
                                                        
                                                        @if($library)
                                                        <li class="d-inline-block">
                                                            <a href="#" class="btn btn-gradient-primary btn-rounded">In Library</a>
                                                        </li>
                                                        @else
                                                            <li class="d-inline-block">
                                                                <a href="{{ url('library/add-book') }}?book_id={{ $book->id }}" class="add-library btn btn-gradient-primary btn-rounded">Add to Library</a>
                                                            </li>
                                                        @endif                                                    
                                                    </ul>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
=======
                        <div class="history-book-cover col-md-2 col-3">
                            <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                <img class="rounded" alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/150/'.$book->cover) }}">
                            </a>
                        </div>
                        <div class="history-details col-md-10 col-9">
                            <h4 class="book-title">
                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                    {{ $book->novel }}
                                </a>
                            </h4>
                            <div class="book-star">
                                <ul class="stars-list" style="font-size: 0.9rem">
                                    @php
                                    for($i = 0; $i<$book->rating; $i++)
                                    echo("<li class='star-item active'><i class='mdi mdi-star'></i></li>");
                                    if($book->rating<5){
                                        $r = 5 - $book->rating;
                                        for($i = 0; $i<$r; $i++)
                                        echo("<li class='star-item inactive'><i class='mdi mdi-star'></i></li>");
                                    }
                                    echo("<li class='star-item'><i class=''></i>(".$book->rating.")</li>")
                                    @endphp
                                </ul>
                            </div>
                            <p class="book-desc">{{ $book->description }}</p>
                            <div class="history-progress">
                                <div class="book-progress d-inline-block">
                                    @php
                                    echo 'Progress '.$chapter->chapter_no.'/'.$book->chapters;                                               
                                    @endphp
>>>>>>> 0d5fa8a9ad8559fc532c67c0035779098fd7dae2
                                </div>
                                <div class="history-actions d-inline-block float-right">
                                    <ul class="p-0">
                                        <li class="d-inline-block c-read">
                                            <a href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}" class="btn btn-sm btn-gradient-primary btn-rounded">
                                                Continue Reading
                                            </a>
                                        </li>
                                        
                                        @if($library)
                                        <li class="d-inline-block">
                                            <a href="#" class="btn btn-sm btn-gradient-primary btn-rounded">In Library</a>
                                        </li>
                                        @else
                                            <li class="d-inline-block">
                                                <a href="{{ url('library/add-book') }}?book_id={{ $book->id }}" class="add-library btn-sm btn btn-gradient-primary btn-rounded">
                                                    Add to Library
                                                </a>
                                            </li>
                                        @endif                                                    
                                    </ul>
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection