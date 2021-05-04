<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Team;

use App\Http\Requests\CreateNewsRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function index() {
        $news = News::with(['user', 'teams'])  
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        // return $news;

        return view ('news.index', compact('news'));
    }


    public function show(News $article) {
        return view('news.show', compact('article'));
    }

    public function team_news($teamName) {
        $team = Team::where('name', $teamName)->firstOrFail();
        $news = $team->news()->paginate(5);

        return view('news.team_news', compact('news', 'team'));
    }

    public function getForm() {
        $teams = Team::select('name', 'id')->get();
        return view('news.create', compact('teams'));
    }

    public function store(CreateNewsRequest $request) {
        $data = $request->validated();

        $newArticle = auth()->user()->news()->create($data);
        $newArticle->teams()->attach(Arr::get($data, 'teams', []));

        Session::flash('status', 'Thank you for publishing an article on www.nba.com.');

        return redirect('/news');
    }
}
