@extends('tpl.master')
@section('content')
    <div class="page-header">
        <h1>
            Step
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Static &amp; Dynamic Tables
            </small>
        </h1>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <p>{!!session('message') !!}</p>

        </div>
    @endif

    <div class="row">
        <div class="col-sm-8">
            <div class="panel">
            {!! Form::open(
                    array(
                         'url'=>'tasklogs',
                         'class' => 'form',
                         'method'=>'post',
                         'files' => true)) !!}

            <div class="form-group">
                <input type="hidden" name="task_id" value="{{$task->id}}">
                {!! Form::label("任务名称") !!}
                <input type="text" name="task_name" value="{{$task->name}}" disabled>
                <span class="badge {!! $task->step->icon !!}">{!! $task->step->name !!}</span>
                <a href="/download/task/{!! $task->id !!}"><i class="ace-icon fa fa-download fa-2x"></i></a>
            </div>
                <div class="form-group">
                    {!! Form::label('选择下一步') !!}
                {!! Form::select('step_id',\App\TaskStep::where('code','>',$task->step->code)->lists('name','id'),null) !!}
                </div>
            <div class="form-group">
                {!! Form::label('Remark') !!}
                {!! Form::textarea('remark') !!}
            </div>

            <div class="form-group">
                {!! Form::label('文件') !!}
                {!! Form::file('attachment', ['required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('上传文件') !!}
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>

@endsection