<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookOriginalController;
use App\Http\Controllers\BookTranslatedController;
use App\Http\Controllers\ChapterTranslated;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebpageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/**
 * ------------------------------------------------------------------------
 * ADMIN URL
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'admin'])->group(function () {
    /**Dashboard */
    Route::get('/admin', function () {
        return view('layouts/dashboard');
    });

    /**Books */
    Route::resource('admin/book_translated', BookTranslatedController::class);
    Route::resource('admin/book_original', BookOriginalController::class);

    /**Users */
    Route::resource('admin/users', UserController::class);

    /**Extras */
    Route::resource('admin/genre', GenreController::class);
    Route::resource('admin/tag', TagController::class);

    /**Chapter Upload */
    Route::get('/admin/chapter/{id}', [ChapterTranslated::class, 'edit']);
    Route::get('/admin/chapter/add/{book_id}', [ChapterTranslated::class, 'create']);
    Route::post('/admin/chapter/add', [ChapterTranslated::class, 'store']);
    Route::put('/admin/chapter/edit/{id}', [ChapterTranslated::class, 'update']);
    Route::delete('/admin/chapter/delete/{id}', [ChapterTranslated::class, 'delete']);

    /**Ajax Url */
    Route::post('/search-genre', [AjaxController::class, 'genre_search']);
    Route::post('/add-genre', [AjaxController::class, 'add_genre']);
    Route::post('/delete-genre', [AjaxController::class, 'delete_genre']);
    Route::post('/search-tag', [AjaxController::class, 'tag_search']);
    Route::post('/add-tag', [AjaxController::class, 'add_tag']);
    Route::post('/delete-tag', [AjaxController::class, 'delete_tag']);
});

/**
 * ------------------------------------------------------------------------
 * AJAX URL
 * ------------------------------------------------------------------------
 * */
Route::middleware('verified')->group(function () {
    Route::post('/add-review', [AjaxController::class, 'add_review']);
    Route::post('/edit-review', [AjaxController::class, 'edit_review']);
    Route::post('/add-comment', [AjaxController::class, 'add_comment']);
    Route::post('/edit-comment', [AjaxController::class, 'edit_comment']);
    Route::post('/add-like', [AjaxController::class, 'add_like']);
    Route::post('/edit-like', [AjaxController::class, 'edit_like']);
    Route::post('/add-reply', [AjaxController::class, 'add_reply']);
    Route::post('/edit-reply', [AjaxController::class, 'edit_reply']);
});

/**Authentication */
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');

/**Image Upload */
Route::post('/image-upload', [ImageController::class, 'upload']);

Route::post('/view-reply', [AjaxController::class, 'view_replies']);
Route::post('/search', [AjaxController::class, 'search']);

/**
 * ------------------------------------------------------------------------
 * WEBPAGE URL
 * ------------------------------------------------------------------------
 * */
Route::get('/', [WebpageController::class, 'homepage']);
Route::get('/novel/{slug}/{id}', [WebpageController::class, 'book_info']);
Route::match(['get', 'post'], '/novels', [WebpageController::class, 'all_novels']);
Route::match(['get', 'post'], 'genre/{id}/{slug}', [WebpageController::class, 'genre_books']);
Route::match(['get', 'post'], '/tag/{id}/{slug}', [WebpageController::class, 'novels_by_tag']);
Route::get('/{book_slug}/{id}/{chapter_slug}', [WebpageController::class, 'chapter']);
Route::post('/user_login', [AuthController::class, 'authenticate']);
Route::post('/user_register', [AuthController::class, 'register']);
Route::get('/user_logout', [AuthController::class, 'logout']);
Route::get('/genre', [WebpageController::class, 'all_genre']);
Route::get('/tags', [WebpageController::class, 'all_tags']);

/**Forgot Password */
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'email_password'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'update_password'])->name('password.update');
});

/**Profile */
Route::middleware('verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('profile/edit', [ProfileController::class, 'edit_profile']);
    Route::post('save-profile', [ProfileController::class, 'save_profile']);
    Route::get('/library', [LibraryController::class, 'index']);
    Route::delete('library/delete/{id}', [LibraryController::class, 'delete']);
    Route::get('library/add-book', [LibraryController::class, 'store']);
    Route::get('/activity', [ProfileController::class, 'activity']);
    Route::get('/reading-history', [HistoryController::class, 'index']);
});

/**Email Verification */
Route::get('/email/verify', [AuthController::class, 'verify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify_email'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verification-notification', [AuthController::class, 'email_resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

/**
 * ------------------------------------------------------------------------
 * Other URLs
 * ------------------------------------------------------------------------
 * */
//Route::get('/py-add', [ChapterTranslated::class, 'store_py']);
//Route::get('extra', [WebpageController::class, 'extra']);

//Policy
Route::get('/privacy-policy', function () {
    return view('webpage/policy');
});
Route::get('/about', function () {
    return view('webpage/about');
});
Route::get('/contact-us', function () {
    return view('webpage/contact');
});
Route::get('/terms-of-service', function () {
    return view('webpage/toc');
});