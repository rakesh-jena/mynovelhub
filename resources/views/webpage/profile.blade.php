@extends('web')
@section('title', 'Profile')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<div class="profile-wrapper container-fluid mt-5 mb-5">
    @include('webpage.profile_sidebar')
    <div class="main-panel profile-panel">
        <div class="profile-content-wrapper">
            <div class="card">
                <div class="card-body p-0 pb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="user-cover">
                                <img src="{{ url('images/user-cover') }}/{{ $user_meta->cover_photo }}" alt="{{ $user_meta->cover_photo }}">
                            </div>
                            <div class="user-avatar pl-5 pr-5">
                                <img src="{{ url('images/user-avatar') }}/{{ $user_meta->avatar }}" alt="{{ $user_meta->avatar }}">
                                <a href="{{ url('profile/edit') }}" class="btn btn-gradient-primary btn-sm float-right mt-5">
                                    Edit
                                </a>
                            </div>
                            <div class="user-bio pl-5 pr-5">
                                <div class="bio-username">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                                <div class="bio-about">
                                    <p>{{ $user_meta->about }}</p>
                                </div>
                                <div class="bio-joined">
                                    <span>
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('jS') }}&nbsp;
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('F') }},
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}
                                    </span>
                                </div>
                                <div class="bio-location">
                                    {{ $user_meta->location }}
                                </div>
                            </div>
                            <div class="user-reads pl-5 pr-5"></div>
                            <div class="user-recent-activity pl-5 pr-5"></div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection