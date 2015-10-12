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
                <i class="ace-icon fa fa-plus "></i> 机柜
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">rack 登记</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'racks',
                                   'class'=>'form form-horizontal',
                                   )
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">

                                        <label for="" class="col-sm-2 control-label">机柜编号</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('name','',['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'name']) !!}
                                        </div>




                                    </div>
                                    <div class="form-group has-info">
                                        <label for="" class="col-xs-2 control-label  ">公司</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>


                                        <label for="" class="col-xs-2 control-label">Building</label>
                                        <div class="col-xs-2">
                                            {!! Form::text('building','' ,['required','class'=>'form-control input-sm'])!!}
                                        </div>



                                    </div>
                                    <div class="form-group">



                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-xs-2 control-label">Floor</label>
                                        <div class="col-xs-2">
                                            {!! Form::text('floor','' ,['required','class'=>'form-control input-sm'])!!}
                                        </div>
                                        <label for="" class="col-sm-2 control-label">尺寸</label>
                                        <div class="col-sm-2">
                                            {!! Form::select('size',['9'=>'9','12'=>'12','24'=>'24','42'=>'42'],['class'=>'form-control input-sm']) !!}U
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

                    <th class="hidden-320">机柜名称</th>


                    <th>公司</th>
                    <th>厂房</th>
                    <th>楼层</th>
                    <th>尺寸</th>
                    <th>上层机柜</th>
                    <th></th>

                </tr>

                </thead>
                <tbody>
                    @foreach($racks as $rack)
                        <tr>
                            <td>{!! $rack->name !!}</td>


                            <td>{!! $rack->company->name !!}</td>
                            <td>{!! $rack->building !!}</td>
                            <td>{!! $rack->floor !!}</td>
                            <td>{!! $rack->size !!}</td>
                            <td>{!! $rack->uplink_rack_id !!}</td>
                            <td>
                                <a href="/racks/{!! $rack->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a>
                                <a href="/delete/rack/{!! $rack->id !!}"><i class="ace-icon fa fa-remove"></i></a>
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