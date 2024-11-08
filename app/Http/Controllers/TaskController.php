<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch paginated tasks with 10 items per page
        $tasks = Task::where('user_id',Auth::id())->paginate(10);
        // dd($tasks);
        // Return the tasks view with the paginated tasks
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new task
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'status' => 'required|in:complete,pending',
        ]);
        // dd($request);
        // Create a new task using validated data
        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'status' => 'required|in:complete,pending',
        ]);
        // Update the task with the new data
        $task->update($request->only(['title', 'description', 'status']));
        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Delete the task from the database
        $task->delete();
        //rest count
        $this->resetids();
        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    //reset count 
    protected function resetids()
    {
        $tasks = Task::orderBy('id')->get();
        foreach ($tasks as $index => $task) {
            $task->id = $index + 1; 
            $task->save();
        }
        DB::statement('ALTER TABLE tasks AUTO_INCREMENT = ' . (count($tasks) + 1));
    }
}

