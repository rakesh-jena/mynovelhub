@extends('web')
@section('title', $chapter->ch_name.' | '.$book->novel)
@section('meta_keywords', 'Read chapter '.$chapter->ch_name.' of '.$book->novel.' Free, '.$chapter->ch_name.'')
@section('meta_description', $book->description)

@section('content')
@php
    if(isset($_COOKIE['font_family']))
    $font_family = $_COOKIE['font_family'];
    else {
        $font_family = 'Mulish';
    }
    if(isset($_COOKIE['font_size']))
    $font_size = $_COOKIE['font_size'];
    else {
        $font_size = '18px';
    }
    if(isset($_COOKIE['dark_mode']))
    $dark_mode = $_COOKIE['dark_mode'];
    else {
        $dark_mode = 'inactive';
    }
@endphp
<style>
    .ch_content-wrapper p{
        white-space: normal;
        font-family: {{ $font_family }};
        line-height: 1.5;
        font-size: {{ $font_size }};
    }
    .chapter-container.dark {
        background: black;
        color: white;
    }
</style>
<div class="chapter-container container box-sh {{ $dark_mode == 'active' ? 'dark' : '' }}">
    <div class="mb-4">
        <h3 class="text-center text-uppercase" style="font-family: cursive">
            <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">{{ $book->novel }}</a>
        </h3>
    </div>
    <div class="mb-2 d-flex">
        @if($previous)        
        <a href="{{ url($book->slug.'/'.$previous->id.'/'.$previous->slug) }}" class="float-left btn-floating btn btn-gradient-primary mr-auto">Previous</a>
        @else
        <a href="#" class="float-left btn btn-gradient-light btn-floating disabled mr-auto">Previous</a>
        @endif
        <h4 class="text-center text-capitalize m-auto" style="font-family: cursive"><i class="">ch.{{ $chapter->chapter_no }}&ensp;</i>{{ $chapter->ch_name }}
        </h4>
        @if($next)
        <a href="{{ url($book->slug.'/'.$next->id.'/'.$next->slug) }}" class="float-right btn-floating btn btn-gradient-primary ml-auto">Next</a>
        @else
        <a href="#" class="float-right btn btn-gradient-light btn-floating disabled mr-auto">Next</a>
        @endif
    </div>
    <div class="ch_content">
        <div class="ch_content-wrapper">{!! nl2br($chapter->content) !!}</div>
    </div>
    <div class="mb-2 d-flex">
        @if($previous)        
        <a href="{{ url($book->slug.'/'.$previous->id.'/'.$previous->slug) }}" class="float-left btn btn-gradient-primary btn-floating mr-auto">Previous</a>
        @else
        <a href="#" class="float-left btn btn-gradient-light btn-floating disabled mr-auto">Previous</a>
        @endif
        <h4 class="text-center text-capitalize m-auto" style="font-family: 'Mulish'">END
        </h4>
        @if($next)
        <a href="{{ url($book->slug.'/'.$next->id.'/'.$next->slug) }}" class="float-right btn btn-gradient-primary btn-floating ml-auto">Next</a>
        @else
        <a href="#" class="float-right btn btn-gradient-light btn-floating disabled mr-auto">Next</a>
        @endif
    </div>
</div>
<div class="chapter-options fixed-left">
    <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon d-xm-inline-block d-block m-1 btn-ch-op" data-div="chapter-list-container">
        <i class="mdi mdi-view-list"></i>
    </button>
    <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon d-xm-inline-block d-block m-1 btn-ch-op" data-div="chapter-setting-container">
        <i class="mdi mdi-settings"></i>
    </button>
    <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon d-xm-inline-block d-block m-1 btn-ch-op" data-div="chapter-comment-container">
        <i class="mdi mdi-comment-text"></i>
    </button>
</div>
<div class="chapter-option-container fixed-left position-fixed d-none">
    <div class="close-btn d-block ml-auto float-right p-1">
        <i class="mdi mdi-close-circle"></i>
    </div>
    <div class="chapter-setting-container ch-c d-none">
        <div class="chapter-option-header d-block">
            <h3 class="bb-grey mt-1 mb-1">Settings</h3>           
        </div>
        <div class="ch-setting">
            <div class="ch-bg mb-2">
                <span class="ch-s-h d-block mb-1">Background</span>
                @if($dark_mode == 'active')
                <button class="light-btn btn btn-rounded btn-outline-primary btn-sm">Light</button>
                <button class="dark-btn btn btn-rounded btn-gradient-primary btn-sm" disabled>Dark</button>
                @else
                <button class="light-btn btn btn-rounded btn-gradient-primary btn-sm" disabled>Light</button>
                <button class="dark-btn btn btn-rounded btn-outline-primary btn-sm">Dark</button>
                @endif
            </div>
            <div class="ch-fn mb-2">
                <span class="ch-s-h d-block mb-1">Font</span>
                @if($font_family == 'Mulish')
                <button class="font-mulish btn btn-rounded btn-gradient-primary btn-sm" disabled>Mulish</button>
                <button class="font-cursive btn btn-rounded btn-outline-primary btn-sm">Cursive</button>
                @else
                <button class="font-mulish btn btn-rounded btn-outline-primary btn-sm">Mulish</button>
                <button class="font-cursive btn btn-rounded btn-gradient-primary btn-sm" disabled>Cursive</button>
                @endif
            </div>
            <div class="ch-fn-sz mb-2">
                <span class="ch-s-h d-block mb-1">Font Size</span>
                <button class="btn btn-rounded btn-gradient-primary btn-icon" id="f_in">A+</button>
                <button class="btn btn-rounded btn-gradient-primary btn-icon" id="f_de">A-</button>
            </div>
        </div>
    </div>
    <div class="chapter-list-container d-none ch-c">
        <div class="chapter-option-header d-block">
            <h3 class="bb-grey mt-1 mb-1">Chapters</h3>           
        </div>
        <div class="ch-list-wrapper">
            @foreach ($chapters_list as $ch)
            
            <div class="ch-item">
                <a class="d-block ch_an" href="{{ url($book->slug.'/'.$ch->id.'/'.$ch->slug) }}">
                    <i class="ch_num">{{ $ch->chapter_no }}</i>
                    <div class="d-block overflow-hidden">
                        <strong class="ch_name">{{ $ch->ch_name }}</strong>
                        <small class="ch_time">{{ Carbon\Carbon::parse($ch->updated_at)->diffForHumans() }}</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="chapter-comment-container d-none ch-c">
        <div class="chapter-option-headerx d-block">
            <h3 class="mt-1 mb-1 bb-grey">Comments</h3>
            
        </div>
        @if (Auth::check())
            <button class="btn btn-rounded btn-gradient-primary btn-sm font-weight-medium ml-auto"
                data-toggle="modal" data-target="#add_comment_modal">
                Add
            </button>
        @else
            <p>Please log in to add review!!</p>
        @endif
        <div class="reviews d-block">

            @foreach($comments as $review)
            @php
            $user = App\Models\User::where('id', $review->user_id)->first();
            $user_meta = App\Models\UserMeta::where('user_id', $review->user_id)->first();
            $likes = App\Models\UserLike::where('liked_type', 'user_comment')->where('liked_id', $review->id)->count();
            if(Auth::check())
            $liked = App\Models\UserLike::where('liked_type', 'user_comment')->where('liked_id',
            $review->id)->where('user_id', Auth::user()->id)->first();
            $replies = App\Models\UserReply::where('reply_type', 'user_comment')->where('replied_id',
            $review->id)->count();
            @endphp
            <div class="review-item">
                <div class="review-user">
                    <div class="nav-profile-img d-inline-block">
                        <img src="{{ url('images') }}/{{ $user_meta->avatar }}" alt="{{ $user_meta->avatar }}">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text d-inline-block">
                        <p class="mb-1 text-black">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="review-star">
                    <ul class="stars-list">
                        @php
                        for($i = 0; $i<$review->rating; $i++)
                            echo("<li class='star-item'><i class='mdi mdi-star'></i></li>");
                            @endphp
                    </ul>
                </div>
                <div class="review-content mb-2">
                    <p>{!! nl2br($review->content) !!}</p>
                </div>
                <div class="review-others clearfix mb-2">
                    <span class="float-left">
                        {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                    </span>
                    <span class="float-right">
                        @if(Auth::check() && $liked === null)
                        <a href="#" class="like-btn" data-id="{{ $review->id }}" data-type="user_comment"
                            data-url="{{ url('add-like') }}" data-user="{{ Auth::user()->id }}">
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
                            <a href="#" data-toggle="modal" data-target="#add_reply_modal" data-type="user_comment"
                                data-id="{{ $review->id }}" class="open-add_reply_modal">
                            @else
                            <a href="#">
                            @endif
                                <strong class="reply">
                                    <i class="mdi mdi-message-outline"></i>
                                    <span>{{ $replies }}</span>
                                </strong>
                            </a>
                    </span>
                </div>
                @if($replies>0)
                <div class="view-replies">
                    <a href="#" data-toggle="modal" data-target="#view_reply_modal" data-url="{{ url('view-reply') }}"
                        data-id="{{ $review->id }}" data-type="user_comment" class="open-view_reply_modal">
                        <i class="mdi mdi-message"></i>
                        <span class="text-uppercase">View {{ $replies }} replies</span>
                    </a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@if (Auth::check())
@include('modals.add_comment')
@include('modals.add_reply')
@endif

@include('modals.view_reply')
@endsection
