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
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active text-capitalize" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">review</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link text-capitalize" id="reply-tab" data-toggle="tab" href="#reply" role="tab" aria-controls="reply" aria-selected="false">reply</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link text-capitalize" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="false">comment</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    @if($reviews)
                                    @foreach ($reviews as $review)
                                    @php
                                        $book = App\Models\BookTranslated::where('id', $review->book_id)->first();    
                                    @endphp
                                    <div class="activity-item mb-3">
                                        <div class="activity-content mb-2">
                                            {{ $review->content }}
                                        </div>
                                        <div class="row">
                                            
                                            <div class="activity-book-cover col-1">
                                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                    <img alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/48/'.$book->cover) }}">
                                                </a>
                                            </div>
                                            <div class="activity-details col-11">
                                                <h6 class="book-title">
                                                    <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                        {{ $book->novel }}
                                                    </a>
                                                </h6>
                                                <div class="book-star">
                                                    <ul class="stars-list" style="font-size: 0.9rem">
                                                        @php
                                                        for($i = 0; $i<$review->rating; $i++)
                                                        echo("<li class='star-item active'><i class='mdi mdi-star'></i></li>");
                                                        if($review->rating<5){
                                                            $r = 5 - $review->rating;
                                                            for($i = 0; $i<$r; $i++)
                                                            echo("<li class='star-item inactive'><i class='mdi mdi-star'></i></li>");
                                                        }
                                                        @endphp
                                                    </ul>
                                                </div>                                      
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="reply" role="tabpanel" aria-labelledby="reply-tab">
                                    @if($replies)
                                    @foreach ($replies as $reply)
                                    @php
                                        if($reply->reply_type == 'user_review'){
                                            $review = App\Models\UserReview::where('id', $reply->replied_id)->first();
                                            $user_replied = App\Models\User::where('id', $review->user_id)->first();
                                            $book = App\Models\BookTranslated::where('id', $review->book_id)->first(); 
                                        }
                                        
                                        if($reply->reply_type == 'user_comment'){
                                            $re_com = App\Models\UserComment::where('id', $reply->replied_id)->first();
                                            $user_replied = App\Models\User::where('id', $re_com->user_id)->first();
                                            $chapter = App\Models\ChapterTranslation::where('id', $re_com->chapter_id)->select('id', 'slug', 'book_id', 'chapter_no', 'ch_name')->first();
                                            $book = App\Models\BookTranslated::where('id', $chapter->book_id)->first(); 
                                        }  
                                    @endphp
                                    <div class="activity-item mb-3">
                                        <div class="activity-content">
                                            {{ $reply->content }}
                                        </div>
                                        <div class="row">
                                            
                                            <p class="replied-to">Replied to {{ $user_replied->name }}</p>
                                            @if($reply->reply_type == 'user_comment')
                                                <a class="activity-chapter" href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}">
                                                    {{ $chapter->ch_name }}
                                                </a>
                                            @endif
                                            <div class="activity-book-cover col-2">
                                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                    <img alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/48/'.$book->cover) }}">
                                                </a>
                                            </div>
                                            <div class="activity-details col-10">
                                                <h6 class="book-title">
                                                    <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                        {{ $book->novel }}
                                                    </a>
                                                </h6>
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
                                                        @endphp
                                                    </ul>
                                                </div>                                      
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                                    @if($comments)
                                    @foreach ($comments as $comment)
                                    @php
                                        $chapter = App\Models\ChapterTranslation::where('id', $comment->chapter_id)->select('id', 'slug', 'book_id', 'chapter_no', 'ch_name')->first();
                                        $book = App\Models\BookTranslated::where('id', $chapter->book_id)->first();    
                                    @endphp
                                    <div class="activity-item mb-3">
                                        <div class="activity-content">
                                            {{ $comment->content }}
                                        </div>
                                        <div class="row">
                                            
                                            <a class="activity-chapter" href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}">
                                                {{ $chapter->ch_name }}
                                            </a>
                                            <div class="activity-book-cover col-2">
                                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                    <img alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/48/'.$book->cover) }}">
                                                </a>
                                            </div>
                                            <div class="activity-details col-10">
                                                <h6 class="book-title">
                                                    <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                                        {{ $book->novel }}
                                                    </a>
                                                </h6>
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
                                                        @endphp
                                                    </ul>
                                                </div>                                      
                                            </div>
                                        </div> 
                                    </div>   
                                    @endforeach
                                    @endif
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection