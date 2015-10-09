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

    <div class="row">
        <div class="col-xs-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn  btn-purple btn-xs  " data-toggle="modal" data-target="#myModal">
                <i class="ace-icon fa fa-plus "></i> 新任务
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">新任务</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'tasks',
                                   'class'=>'form form-horizontal',
                                   'files'=>true)
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">
                                        <label for="" class="col-sm-2 control-label">任务编号</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('name','',['class'=>'form-control col-sm-6',' required autofocus']) !!}
                                        </div>
                                        <div class="col-sm-2">
                                            {!! Form::select('category_id',\App\TaskCategory::lists('name','id'),null,['class'=>'form-control col-sm-6',' required autofocus']) !!}
                                        </div>

                                        {!! Form::hidden('step_id',1) !!}

                                    </div>
                                    <div class="form-group has-info">
                                        <label for="" class="col-xs-2 control-label  ">公司</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>


                                        <label for="" class="col-xs-2 control-label">成本中心</label>
                                        <div class="col-xs-2">
                                            {!! Form::text('costcenter','' ,['required','class'=>'form-control input-sm','pattern'=>'[0-9]{4}'])!!}
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">申请人</label>
                                        <div class="col-sm-3">
                                            {!! Form::text('applicant','',['class'=>'form-control required input-sm']) !!}
                                        </div>

                                        <label for="" class="col-sm-2 control-label">电话</label>
                                        <div class="col-sm-3">
                                            {!! Form::text('phone','',['class'=>'form-control input-sm','required']) !!}
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">网线</label>
                                        <div class="col-sm-3">
                                            {!! Form::number('qty_network','0',['class'=>'form-control input-sm']) !!}
                                        </div>

                                        <label for="" class="col-sm-2 control-label">电话线</label>
                                        <div class="col-sm-3">
                                            {!! Form::number('qty_telecom','0',['class'=>'form-control input-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">描述</label>
                                        <div class="col-xs-8">
                                            {!! Form::text('subject','',['class'=>'form-control']) !!}
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">详细</label>
                                        <div class="col-xs-8">
                                            <textarea name="reason" class="form-control limited" id="form-field-9" maxlength="80"></textarea>

                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <!-- #section:custom/file-input -->
                                            <label class="ace-file-input">  {!! Form::file('attachment',['required']) !!}<span class="ace-file-container" data-title="选择"><span class="ace-file-name" data-title="上传附件"><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">存盘</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!-- end Model-->
            @if (count($errors) > 0)
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
            @endif


            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <p>{!!session('message') !!}</p>

                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tbl_tasks">
                <thead>
                <tr>
                    <th class="hidden-320">项目名称</th>

                    <th>申请人</th>
                    
		             <th>Phone</phone>
                    <th>Subject</th>
		            <th>公司</th>
                    <th>成本中心</th>
                    <th>Reason</th>
                    <th>Status</td>
		            <th>细节</th>
                    <th>采购清单</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name  }}</td>
                            <td>{{ $task->applicant }}</td>
                            <td>{!! $task->phone !!}</td> 
                            <td>{!! $task->subject !!}</td>
			    <td>{{ $task->company->name }}</td>
                            <td>{{ $task->costcenter }}</td>
			   <td>{!! $task->reason !!}</td>
                      	 <td><span class="badge {{ $task->step->icon }}"> {{ $task->step->name }} </span><a href="/tasklogs/{{$task->id}}/edit"><i class="ace-icon fa fa-edit "></i></a></td>
			      <td><a href="/tasklogs/timelime/{{$task->id}}"><i class="ace-icon fa fa-mobile"></i></a></td>
                            <td><a href="/taskforms/{!! $task->id !!}"><i class="ace-icon fa fa-pencil"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')

    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/jquery.dataTables.bootstrap.js "></script>
    <script>
        $(document).ready(function(){
            $("#tbl_tasks").wrap("<div class='dataTables_borderWrap' />")
                    .dataTable({
                        bAutoWidth:false//for better responsiveness

                    });
        });
    </script>

@endsection
