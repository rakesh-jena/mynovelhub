@extends('web')
@section('title', 'Edit Profile')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')
<style>
    img#user_cover, #user_avatar {
        width: 50%;
        height: auto;
    }
</style>
@section('content')
<div class="profile-wrapper container mt-md-5 mb-md-5 mt-2 mb-2">
    <div class="profile-panel">
        <div class="profile-content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-uppercase">Edit</h3>
                    <form class="form-profile-edit" enctype="multipart/form-data" action="{{ url('save-profile') }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-capitalize">Username</label>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Username"
                                        aria-label="Username" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize">email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Email"
                                        aria-label="Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize">location</label>
                                    <input type="text" name="location" class="form-control form-control-sm" placeholder="Location"
                                        aria-label="Location" value="{{ $user_meta->location }}">
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize">gender</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="optionsRadios1"
                                                value="male" checked=""> Male <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="optionsRadios2"
                                                value="female"> Female <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-uppercase">about</label>
                                    <textarea class="form-control form-control-sm" name="about"
                                        placeholder="Write something to describe you.." aria-label="About">{{ $user_meta->about }}</textarea>
                                </div>
                                <button class="btn btn-gradient-danger btn-sm">
                                    Save
                                </button>
                                <a href="{{ url('profile') }}" class="btn btn-gradient-primary btn-sm">
                                    Cancel
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-uppercase" for="cover">Select a file:</label>
                                    <img alt="User Profile Cover" id="user_cover" src="{{ URL::asset('images/user-cover/'.$user_meta->cover_photo) }}">
                                    <input type="hidden" name="cover_photo" id="cover_image" value="{{ $user_meta->cover_photo }}">
                                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm"
                                        data-toggle="modal" data-target="#select_image_modal" data-url="{{ url('image-upload') }}" data-src="{{ url('images/temp') }}"
                                        data-height="520" data-width="1280" data-input="cover_image" data-img="user_cover">
                                        Upload Cover
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label class="text-uppercase" for="avatar">Select a file:</label>
                                    <img alt="User Avatar" id="user_avatar" src="{{ URL::asset('images/user-avatar/'.$user_meta->avatar) }}">
                                    <input type="hidden" name="avatar" id="avatar_image" value="{{ $user_meta->avatar }}">
                                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm"
                                        data-toggle="modal" data-target="#select_image_modal" data-url="{{ url('image-upload') }}"
                                        data-height="500" data-width="500" data-input="avatar_image" data-img="user_avatar" data-src="{{ url('images/temp') }}">
                                        Upload Avatar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Select Image-->
@include('modals.select_image')

<!-- Image Crop -->
@include('modals.crop_image')
@endsection