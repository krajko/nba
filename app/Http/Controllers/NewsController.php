<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Team;
use App\Http\Requests\CreateNewsRequest;

class NewsController extends Controller
{
    public function index(Request $request) {
        $news = News::with('user')
                    ->with('teams')
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);

        // return $news;

        return view ('news.index', compact('news'));
    }


    public function show(News $article) {
        return view('news.show', compact('article'));
    }

    public function show_team(Team $team) {
        $team->load('news')->paginate(6);

        return view('news.show_team', compact('team'));
    }

    public function getForm() {
        $teams = Team::select('name', 'id')->get();
        return view('news.create', compact('teams'));
    }

    public function store(CreateNewsRequest $request) {
        $data = $request->validated();

        $newArticle = auth()->user()->news()->create($data);
        $newArticle->teams()->sync($data['teams']);

        $request->session()->flash('status', 'Thank you for publishing an article on www.nba.com.');

        return redirect('/news');
    }
}
