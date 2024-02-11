@extends('web')
@section('title', $book->novel)
@section('meta_keywords', 'Read '.$book->novel.' Free, '.$book->novel.'')
@section('meta_description', $book->description)

@section('content')
<!-- Book Header -->
<section class="book-single mt-sm-4 mb-sm-4">
    <div class="info-container container box-sh">
        <div class="row">
            <div class="col-xl-4 col-xxl-3 col-lg-4 col-sm-6">
                <div class="single-book-cover">
                    <img alt="{{ $book->novel }}" class="rounded" src="{{ URL::asset('images/book-cover/300/'.$book->cover) }}">
                </div>
            </div>
            <div class="col-xl-8 col-xxl-9 col-lg-8 col-sm-6">
                <h1 class="book-single-title">{{ $book->novel }}</h1>
                <div class="book-single-author font-italic">by {{ $book->author }}</div>
                <div class="book-star">
                    <ul class="stars-list">
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
                <div class="story-status mb-4"><span class="badge badge-pill badge-primary text-capitalize">{{ $book->status }}</span></div>
                <div class="story-stat">
                    <li class="d-inline-block">
                        <div class="stats-label">
                            <span class="mdi mdi-format-list-bulleted"></span>
                            <span class="stats-label__text">Chapters</span>
                        </div>
                        <div class="icon-container text-center">
                            <span class="stat-num">{{ $book->chapters }}</span>
                        </div>
                    </li>
                    <li class="d-inline-block">
                        <div class="stats-label">
                            <span class="mdi mdi-eye"></span>
                            <span class="stats-label__text">Views</span>
                        </div>
                        <div class="icon-container text-center">
                            <span class="stat-num">{{ $book->page_view }}</span>
                        </div>
                    </li>
                    <li class="d-inline-block">
                        <div class="stats-label">
                            <span class="mdi mdi-star"></span>
                            <span class="stats-label__text">Reviews</span>
                        </div>
                        <div class="icon-container text-center">
                            <span class="stat-num">{{ count($reviews) }}</span>
                        </div>
                    </li>
                </div>
                
                @if(count($chapters) != 0)
                <div class="story-actions">
                    <ul class="p-0">
                        @if(Auth::check())
                            @if($history)
                                @php
                                $chapter = App\Models\ChapterTranslation::where('id', $history->chapter_id)->select('id', 'slug')->first();   
                                @endphp
                                <li class="d-inline-block">
                                    <a href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}" class="btn btn-floating btn-gradient-primary btn-rounded">
                                        Continue Reading
                                    </a>
                                </li>
                            @else
                            <li class="d-inline-block">
                                <a href="{{ url($book->slug.'/'.$chapters[0]->id.'/'.$chapters[0]->slug) }}" class="btn btn-floating btn-gradient-primary btn-rounded">
                                    Read
                                </a>
                            </li>
                            @endif
                        @else
                        <li class="d-inline-block">
                            <a href="{{ url($book->slug.'/'.$chapters[0]->id.'/'.$chapters[0]->slug) }}" class="btn btn-floating btn-gradient-primary btn-rounded">
                                Read
                            </a>
                        </li>
                        @endif
                        @php
                            if(Auth::check()){
                                $user = Auth::user();
                                $library = App\Models\UserLibrary::where('user_id', $user->id)->where('book_id', $book->id)->first();
                            }
                            
                        @endphp
                        @auth
                        @if($library)
                        <li class="d-inline-block">
                            <a href="#" class="btn btn-gradient-primary btn-rounded">In Library</a>
                        </li>
                        @else
                            <li class="d-inline-block">
                                <a href="{{ url('library/add-book') }}?book_id={{ $book->id }}" class="btn-floating add-library btn btn-gradient-primary btn-rounded">Add to Library</a>
                            </li>
                        @endif
                        @endauth
                        @if(!Auth::check())
                        <li class="d-inline-block">
                            <a href="{{ url('login') }}" class="add-library btn-floating btn btn-gradient-primary btn-rounded">Add to Library</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Book Description -->
<section class="container box-sh mt-sm-4 mb-sm-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                aria-selected="true"><h4>About</h4></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="chapters-tab" data-toggle="tab" href="#chapters" role="tab" aria-controls="chapters"
                aria-selected="false"><h4>Chapters</h4></a>
        </li>
    </ul>
    <div class="tab-content mt-4" id="myTabContent">
        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="book-single-desc mb-4">
                <h4 class="">Synopsis</h4>
                <p class="">{!! nl2br($book->description) !!}</p>
            </div>
            <div class="book-sigle-genre mb-4">
                <h4 class="">Genre</h4>
                @foreach ($g_list as $genre) 
                    <span class="badge badge-pill badge-danger mb-1">{{ $genre['genre'] }}</span>
                @endforeach
            </div>
            <div class="book-sigle-tag">
                <h4 class="">Tags</h4>
                @foreach ($t_list as $tag)
                    <span class="badge badge-pill badge-danger mb-1">{{ $tag['tag'] }}</span>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="chapters" role="tabpanel" aria-labelledby="chapters-tab">
            <div class="row">
                
                @foreach ($chapters as $ch)
                <div class="col-12 col-sm-6">
                    <a class="d-block ch_an" href="{{ url($book->slug.'/'.$ch->id.'/'.$ch->slug) }}">
                        <i class="ch_num text-right">{{ $ch->chapter_no }}.</i>
                        <div class="d-block overflow-hidden">
                            <strong class="ch_name">{{ $ch->ch_name }}</strong>
                            <small class="ch_time">{{ Carbon\Carbon::parse($ch->updated_at)->diffForHumans() }}</small>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- You May Also Like -->

<!-- Book Reviews -->
<section class="container box-sh mt-sm-4 mb-sm-4">
    <h4 class="">Reviews</h4>
    @if (Auth::check())
        
        <button class="btn btn-rounded btn-gradient-primary btn-sm font-weight-medium" data-toggle="modal" data-target="#add_review_modal">
            Add Review
        </button>        
    @else
        <p>Please log in to add review!!</p>
    @endif
    <div class="reviews">
        @foreach($reviews as $review)
        @php
            $user = App\Models\User::where('id', $review->user_id)->first();
            $user_meta = App\Models\UserMeta::where('user_id', $review->user_id)->first();
            $likes = App\Models\UserLike::where('liked_type', 'user_review')->where('liked_id', $review->id)->count();
            if(Auth::check()){
                $liked = App\Models\UserLike::where('liked_type', 'user_review')->where('liked_id', $review->id)->where('user_id', Auth::user()->id)->first();
            }            
            $replies = App\Models\UserReply::where('reply_type', 'user_review')->where('replied_id', $review->id)->count();
        @endphp
        <div class="review-item">
            <div class="review-user d-flex">
                <div class="nav-profile-img d-inline-block mr-1">
                    <img src="{{ URL::asset('images/user-avatar') }}/{{ $user_meta->avatar }}" alt="image">                    
                </div>
                <div class="nav-profile-text d-inline-block">
                    <p class="mb-0 text-black font-italic">{{ $user->name }}</p>
                    <div class="review-star">
                        <ul class="stars-list">
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
            
            <div class="review-content mb-1">
                <p class="mb-0">{!! nl2br($review->content) !!}</p>
            </div>
            <div class="review-others clearfix mb-2">
                <span class="float-left">
                    {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                </span>
                <span class="float-right">
                    @if(Auth::check() && $liked === null)                    
                    <a href="#" class="like-btn" data-id="{{ $review->id }}" data-type="user_review" data-url="{{ url('add-like') }}" data-user="{{ Auth::user()->id }}">
                    @else
                    <a href="#">
                    @endif
                        <strong class="like pr-2">
                            @if(Auth::check() && $liked === null)
                            <i class="mdi mdi-thumb-up-outline"></i>
                            @else
                            <i class="mdi mdi-thumb-up"></i>
                            @endif
                            <span>{{ $likes }}</span>
                        </strong>
                    </a>
                    @if(Auth::check())
                    <a href="#" data-toggle="modal" data-target="#add_reply_modal" data-type="user_review" data-id="{{ $review->id }}" class="open-add_reply_modal">
                    @else
                    <a href="#">
                    @endif
                        <strong class="reply">
                            <i class="mdi mdi-message-outline"></i>
                            <span>{{ $replies }}</span>
                        </strong>
                    </a>
                    @if($review->user_id == Auth::id())
                        <button class="btn btn-rounded btn-gradient-primary btn-sm font-weight-medium" data-toggle="modal" data-target="#edit_review_modal">
                            Edit Review
                        </button>
                        @include('modals.edit_review')
                    @endif
                </span>
            </div>
            @if($replies>0)
            <div class="view-replies">
                <a href="#" data-toggle="modal" data-target="#view_reply_modal" data-url="{{ url('view-reply') }}" data-id="{{ $review->id }}" data-type="user_review" class="open-view_reply_modal">
                    <i class="mdi mdi-message"></i>
                    <span class="text-uppercase">View {{ $replies }} replies</span>
                </a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section>

@if (Auth::check())
    @include('modals.add_review')
    @include('modals.add_reply')    
@endif

@include('modals.view_reply')
@endsection