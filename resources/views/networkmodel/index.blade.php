@extends('tpl.master')
@section('content')
    <div class="page-header">
        <h1>
            Step
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                机柜 &amp;
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn  btn-purple btn-xs  " data-toggle="modal" data-target="#myModal">
                <i class="ace-icon fa fa-plus "></i> 网络设备型号
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">networkmodel 登记</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'networkmodels',
                                   'class'=>'form form-horizontal',
                                   'files'=>true)
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">

                                        <label for="" class="col-sm-2 control-label">型号</label>
                                        <div class="col-sm-6">
                                            {!! Form::text('name','',['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'name']) !!}
                                        </div>




                                    </div>
                                    <div class="form-group has-info">


                                        <label for="" class="col-xs-2 control-label">描述</label>
                                        <div class="col-xs-6">
                                            {!! Form::text('description','' ,['required','class'=>'form-control input-sm'])!!}
                                        </div>



                                    </div>
                                    <div class="form-group">



                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-xs-2 control-label">备注</label>
                                        <div class="col-xs-6">
                                            {!! Form::text('remark','' ,['required','class'=>'form-control input-sm'])!!}
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

                    <th class="hidden-320">名称</th>


                    <th>描述</th>
                    <th>备注</th>

                    <th></th>

                </tr>

                </thead>
                <tbody>
                    @foreach($networkmodels as $networkmodel)
                        <tr>
                            <td>{!! $networkmodel->name !!}</td>


                            <td>{!! $networkmodel->description !!}</td>
                            <td>{!! $networkmodel->remark !!}</td>


                            <td>
                                <a href="/networkmodels/{!! $networkmodel->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a>
                                <a href="/delete/networkmodel/{!! $networkmodel->id !!}"><i class="ace-icon fa fa-remove"></i></a>
                            </td>
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