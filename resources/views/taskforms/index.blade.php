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
           <span> {!! $tasks->name !!} {!! $tasks->company->name !!}</span>
            <a href="/reporting/task/excel/{!! $tasks->id !!}" class="btn btn-xs">生成Excel</a>
            <button type="button" class="btn  btn-purple btn-xs  " data-toggle="modal" data-target="#myModal">
                <i class="ace-icon fa fa-plus "></i> 采购清单
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">采购清单</h4>
                        </div>
                        {!! Form::open(
                                   array('url'=>'taskforms',
                                   'class'=>'form form-horizontal'
                                  )
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">
                                        <input type="hidden" name="task_id" value="{!! $tasks->id !!}">
                                        <label for="" class="col-sm-2 control-label">中文描述</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('device_id',\App\Device::lists('c_desc','id')) !!}
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">数量</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('qty','',['class'=>'form-control input-sm']) !!}
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
            <table class="display table table-striped table-bordered compact " cellspacing="0" width="100%" id="tbl_tasks">
                <thead>
                <tr>

                    <th class="hidden-320">中文描述</th>
                    <th>英文描述</th>
                    <th>中文品牌</th>
                    <th>英文品牌</th>
                    <th>型号</th>
                    <th>Spec</th>
                    <th>单位</th>
                    <th>数量</th>

                    <th></th>

                </tr>

                </thead>
                <tbody>
                    @foreach($taskforms as $taskform)
                        <tr>
                            <td>{!! $taskform->device->c_desc !!}</td>
                            <td>{!! $taskform->device->e_desc !!}</td>
                            <td>{!! $taskform->device->c_brand !!}</td>
                            <td>{!! $taskform->device->e_brand !!}</td>
                            <td>{!! $taskform->device->model !!}</td>
                            <td>{!! $taskform->device->spec !!}</td>
                            <td>{!! $taskform->device->unit !!}</td>
                            <td>{!! $taskform->qty !!}</td>
                            <th><a href="/taskforms/{!! $taskform->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a></th>



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
                        bAutoWidth:true,//for better responsiveness
                        fixedColumns: true
                    });

        });
    </script>

@endsection