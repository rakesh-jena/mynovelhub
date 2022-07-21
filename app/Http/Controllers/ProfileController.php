<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\UserLibrary;
use App\Models\UserHistory;
use App\Models\UserLike;
use App\Models\UserReply;
use App\Models\UserReview;
use App\Models\UserComment;
use Auth;
use Image;

class ProfileController extends Controller
{
    //Profile
    public function profile()
    {
        $user = Auth::user();
        $user_meta = UserMeta::where('user_id', $user->id)->first();

        return view('webpage.profile', compact('user', 'user_meta'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        $user_meta = UserMeta::where('user_id', $user->id)->first();

        return view('webpage.edit_profile', compact('user', 'user_meta'));
    }

    public function save_profile(Request $request)
    {
        $user = Auth::user();
        $user_meta = UserMeta::where('user_id', $user->id)->first();

        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'location' => 'required',
            'cover_photo' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'avatar' => 'required',
        ]);

        if($user_meta->cover_photo != $request->cover_photo)
        {
            $tempUrl = url('images/temp/'.$request->cover_photo);
            $image = Image::make($tempUrl);
            $cover = time().'.jpg';
        
            $destinationPath = 'images/user-cover';
            $img = Image::make($tempUrl);
            $img->save($destinationPath.'/'.$cover);
        } else {
            $cover = $user_meta->cover_photo;
        }

        if($user_meta->avatar != $request->avatar)
        {
            $tempUrl = url('images/temp/'.$request->avatar);
            $image = Image::make($tempUrl);
            $avatar = time().'.jpg';
        
            $destinationPath = 'images/user-avatar';
            $img = Image::make($tempUrl);
            $img->save($destinationPath.'/'.$avatar);
        } else {
            $avatar = $user_meta->avatar;
        }
        
        $user_meta->update([
            'location' => $request['location'],
            'about' => $request['about'],
            'cover_photo' => $cover,
            'avatar' => $avatar,
            'gender' => $request['gender']
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        return redirect('profile')
            ->with('success', 'Profile updated successfully.');
    }

    //Activity
    public function activity()
    {
        $user = Auth::user();
        $reviews = UserReview::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
        $replies = UserReply::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
        $comments = UserComment::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

        return view('webpage.activity', compact('reviews', 'replies', 'comments'));
    }
}
