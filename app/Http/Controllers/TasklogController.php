<?php

namespace App\Http\Controllers;

use App\TaskStep;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\TaskLog;

class TasklogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Requests\TasklogRequest $request)
    {
        //
        if($request->hasFile('attachment')){
            $tasklog=$request->except(['_token','attachment']);
            $date=Carbon::now()->format('Y_m_d');
            $path=base_path().'/up/TASK/'.$date;

            $ext=$request->file('attachment')->getClientOriginalExtension();
            $step_id=TaskStep::find($tasklog['step_id'])->first()->value('id');
            $time=Carbon::now()->timestamp;
            $filename="TASK_".$step_id."_".$time.".".$ext;
            $request->file('attachment')->move($path,$filename);
            $tasklog['attachment']=$path."/".$filename;
            $tasklog=TaskLog::create($tasklog);
            Task::find($tasklog['task_id'])->update(['step_id'=>$tasklog['step_id']]);
        }
       // return back();
        return redirect()->to('tasks');
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
        $task=Task::find($id);


        return view('task.log')->with('task',$task);
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

    public function timeline($id){
        $tasklogs=TaskLog::with('step','task')->where('task_id',$id)->get();
        $task=Task::find($id);
        return view('task.timeline')->with('tasklogs',$tasklogs)->with('task',$task);
    }
}
