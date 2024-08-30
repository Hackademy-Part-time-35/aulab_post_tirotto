<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
    public function dashboard(){

        $unrevionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedAricles = Article::where('is_accepted', false)->get();


        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));


    }
}
