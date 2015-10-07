
@extends('tpl.master')
@section('content')

<div class="timeline-container timeline-style2">
   <div class="box">{!! $task->name !!}</div>
    <span class="timeline-label">
			<b> {!! $task->name !!}</b>

	</span>
    @foreach($tasklogs as $tasklog)
    <div class="timeline-items">
        <div class="timeline-item clearfix">
            <div class="timeline-info">
                <span class="timeline-date">{!! $tasklog->created_at !!}</span>

                <i class="timeline-indicator btn btn-info no-hover"></i>
            </div>

            <div class="widget-box transparent">
                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <span class="bigger-110">
							<a href="#" class="purple bolder">{</a>
							{!! $tasklog->task->subject !!}
						</span>

                        <br>
                        <span class="badge {{ $tasklog->step->icon }}"> {{ $tasklog->step->name }} </span>

                        <a href="/download/tasklog/{{$tasklog->id}}"><i class="ace-icon fa fa-envelope" ></i></a>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.timeline-items -->
    @endforeach
</div>

@endsection