<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $news = News::with('user')->paginate(6);

        // return $news;
        return view('news.index', compact('news'));
    }

    public function show(News $article) {
        return view('news.show', compact('article'));
    }
}
