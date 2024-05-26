<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $task = Task::latest()->pagenated(10);

        return view('task.index', compact('task'));
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
}
