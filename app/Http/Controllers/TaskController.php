<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Http\Requests\TaskRequest;
use App\TaskLog;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks=Task::with('company','step','category','log')->where('step_id','<',7)->get();
        return view('task.list',compact('tasks'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        if($request->hasFile('attachment')){

            $data=$request->except(['_token','attachment']);

            $task=Task::create($data);
            $date=Carbon::now()->format('Y_m_d');
            $path=base_path().'/up/TASK/'.$date;

            $ext=$request->file('attachment')->getClientOriginalExtension();
            $filename="TASK_INIT".Carbon::now()->timestamp.".".$ext;
            $request->file('attachment')->move($path,$filename);
            $tasklog['task_id']=$task->id;
            $tasklog['step_id']=$task->step_id;
            $tasklog['attachment']=$path."/".$filename;
            TaskLog::create($tasklog);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
