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
                <i class="ace-icon fa fa-plus "></i> 采购设备编码
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">新设备编码</h4>
                        </div>
                        {!! Form::open(
                                   array('url'=>'devices',
                                   'class'=>'form form-horizontal'
                                  )
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">
                                        <input type="hidden" name="status_id" value="1">
                                        <label for="" class="col-sm-2 control-label">中文描述</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('e_desc','',['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                                        </div>
                                        <label for="" class="col-sm-2 control-label">英文描述</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('c_desc','',['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group has-warning">
                                        <input type="hidden" name="status_id" value="1">
                                        <label for="" class="col-sm-2 control-label">中文品牌</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('e_brand','',['class'=>'form-control col-sm-2 input-sm','required autofocus'] ) !!}
                                        </div>
                                        <label for="" class="col-sm-2 control-label">英文品牌</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('c_brand','',['class'=>'form-control col-sm-2 input-sm',' required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">型号</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('model','',['class'=>'form-control input-sm']) !!}
                                        </div>

                                        <label for="" class="col-sm-2 control-label">单位</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('unit','',['class'=>'form-control input-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">特殊要求</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('spec','',['class'=>'form-control input-sm']) !!}
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

                    <th></th>

                </tr>

                </thead>
                <tbody>
                        @foreach($devices as $device)
                            <tr>
                                <td>{!! $device->c_desc !!}</td>
                                <td>{!! $device->e_desc !!}</td>
                                <td>{!! $device->c_brand !!}</td>
                                <td>{!! $device->e_brand !!}</td>
                                <td>{!! $device->model !!}</td>
                                <td>{!! $device->spec !!}</td>
                                <td><a href="/devices/{!! $device->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a></td>
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