<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskForm;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taskforms = TaskForm::all();
        return view('taskforms.index')->with('taskforms', $taskforms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        TaskForm::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tasks = Task::find($id);
        $taskforms = TaskForm::where('task_id', $id)->with('device', 'task')->get();
        return view('taskforms.index')->with('tasks', $tasks)->with('taskforms', $taskforms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $taskform = TaskForm::find($id);
        return view('taskforms.edit')->with('taskform', $taskform);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $taskform = Taskform::find($id);
        $task_id = $taskform->task_id;
        $data = $request->except(['_token', '_method']);
        $taskform->update($data);
        return redirect('/taskforms/' . $task_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
