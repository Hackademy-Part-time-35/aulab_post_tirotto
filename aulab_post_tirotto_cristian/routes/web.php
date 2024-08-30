<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store',[ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('category.byCategory');
Route::get('/article/user/{user}',[ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashbord', [AdminController::class, 'dashbord'])->name('admin.dashbord');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::get('/revisor/dashbord', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::middleware('revisor')->group(function(){
        Route::post('/revisor/{article}/accept', [RevisorControllert::class, 'acceptArticle'])->name('revisor.acceptArticle');
        Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectASrticle'])->name('revisor.rejectArticle');
        Route::post('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
    });
});
