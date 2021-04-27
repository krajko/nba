<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function store(Team $team, CreateCommentRequest $request) {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;
        $comment = $team->comments()->create($data);

        return back();
    }
}
