<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index() {
        $teams = Team::with('players')
        ->with('comments', function ($qb) {
            return $qb->orderBy('created_at', 'desc');
        })->get();

        return view('teams.index', compact('teams'));
    }

    public function show($id) {
        $team = Team::find($id);

        return view('teams.show', compact('team'));
    }
}
