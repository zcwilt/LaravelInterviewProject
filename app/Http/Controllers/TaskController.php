<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        return view(
            'tasks',
            [
                'tasks' => Task::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'asc')->get(),
                'title' => 'All Tasks'
            ]
        );
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'priority' => 'required|min:0|max:2',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('/tasks');
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/tasks');
    }

}
