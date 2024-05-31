<?php

namespace App\Http\Controllers;

use App\Models\HistoryTask;
use Illuminate\Http\Request;

//import model product
use App\Models\Task;

//import return type view
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $task = Task::latest()->paginate(10);

        return view('task.index', compact('task'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function history()
    {
        $history = HistoryTask::latest()->paginate(10);

        return view('task.history', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(): view
    {
        return view('task.create');
    }

    /**
     * Store
     *
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'title' => 'required'    ,
            'description' => 'required',
            'due_date' => 'required|date',
            'category' => 'required',
            'priority' => 'required',
            'status' => 'required',

        ]);
        

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category' => $request->category,
            'priority' => $request->priority,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get task by ID
        $task = Task::findOrFail($id);

        //render view with task
        return view('task.show', compact('task'));
    }

    /**
     * Edit
     *
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get task by ID
        $task = Task::findOrFail($id);

        //render view with task
        return view('task.edit', compact('task'));
    }

    /**
     * Update
     *
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'title' => 'required'    ,
            'description' => 'required',
            'due_date' => 'required|date',
            'category' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);
        //get task by ID
        $task = Task::findOrFail($id);

        //update task
        $task->update ([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category' => $request->category,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);
        //redirect to index
        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove
     *
     * @param mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get task by ID
        $task = Task::findOrFail($id);
        //delete task
        $task->delete();
        //redirect to index
        return redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }

    /**
     * Mark as done
     *
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */

     public function markAsDone(Request $request, $id)
     {
        $task = Task::findOrFail($id);
     
     // Move to history table
        HistoryTask::create([
            'title' => $task->title,
            'description' => $task->description,
            'due_date' => $task->due_date,
            'category' => $task->category,
            'priority' => $task->priority,
            'status' => 'done', // You can set this to any status you want for the history table
        ]);
     
     // Delete from tasks table
        $task->delete();
     
        return redirect()->route('task.index')->withSuccess('Task is done and moved to history.');
     }     

}
