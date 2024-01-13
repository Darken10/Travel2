<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Administration  */
Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('post', AdminPostController::class)->except(['show'])->middleware('auth');
    Route::resource('tag', AdminTagController::class)->except(['show'])->middleware('auth');

    Route::prefix('/post/comments')->name('comment.')->controller(AdminCommentController::class)->group(function () {
        //liste des commentaire et avec poste
        Route::get('/{post}', 'index')->name('index')->where([
            'post' => '[0-9]+',
        ]);
        //les reponses avec le commentaire et le poste
        Route::get('/{comment}/reponse', 'show')->name('show')->where([
            'comment' => '[0-9]+',
        ]);
        // store la reponse
        Route::post('/{comment}/Sreponse', 'storeReponse')->name('storeReponse')->where([
            'comment' => '[0-9]+',
        ]);
    });
});


/** Client */
Route::prefix('/')->name('post.')->middleware('auth')->controller(PostController::class)->group(function () {
    Route::get('/','index')->name('index');
    
    Route::get('/{post}','show')->name('show')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{tag}/tag','filterByTag')->name('filterByTag')->where([
        'tag'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{post}/like','storeLikePost')->name('storeLikePost')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');


    Route::post('/{post}','storeComment')->name('storeComment')->where([
        'post'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{comment}/comment','reponse')->name('reponse')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');

    Route::post('/{comment}/reponse','storeReponse')->name('storeReponse')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');
    
    Route::get('/{comment}/comment/like','storeLikeComment')->name('storeLikeComment')->where([
        'comment'=>'[0-9]+',
    ])->middleware('auth');

    Route::get('/{reponse}/reponse/like','storeLikeReponse')->name('storeLikeReponse')->where([
        'reponse'=>'[0-9]+',
    ])->middleware('auth');

    
    
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
