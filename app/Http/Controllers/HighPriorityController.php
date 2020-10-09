<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HighPriorityController extends Controller
{
    public function index()
    {
        return view(
            'tasks-list',
            [
                'tasks' => Task::where('user_id', '=', Auth::user()->id)->where('priority', '=', 2)->orderBy('created_at', 'asc')->get(),
                'title' => 'High Priority Tasks'
            ]
        );
    }
}
