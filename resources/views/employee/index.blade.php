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
                <i class="ace-icon fa fa-plus "></i> 新员工
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">员工</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'employees',
                                   'class'=>'form form-horizontal',
                                   'files'=>true)
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">
                                        <input type="hidden" name="status_id" value="1">
                                        <label for="" class="col-sm-2 control-label">工号</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('number','',['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'number']) !!}
                                        </div>
                                        <label for="" class="col-sm-2 control-label">姓名</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('name','',['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                                        </div>


                                        <label for="" class="col-xs-2 control-label  ">类型</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('category_id',\App\EmployeeCategory::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>

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
                                        <label for="" class="col-xs-2 control-label">部门</label>
                                        <div class="col-xs-2">
                                            {!! Form::text('department_name','' ,['required','class'=>'form-control input-sm'])!!}
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">级别</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('level_id',\App\EmployeeLevel::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">电话号码</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('phone_number','',['class'=>'form-control input-sm']) !!}
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">银行账号</label>
                                        <div class="col-sm-10">
                                            {!! Form::number('bank_account','',['class'=>'form-control input-sm']) !!}
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">银行</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('bank_info','中国银行珠海新青支行',['class'=>'form-control input-sm']) !!}
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

                    <th class="hidden-320">工号</th>
                    <th>姓名</th>
                    <th>类别</th>
                    <th>公司</th>
                    <th>部门</th>
                    <th>成本中心</th>
                    <th>银行账户</th>
                    <th>级别</th>
                    <th></th>

                </tr>

                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{!! $employee->number !!}</td>
                            <td>{!! $employee->name !!}</td>
                            <td>{!! $employee->category->name !!}</td>
                            <td>{!! $employee->company->name !!}</td>
                            <td>{!! $employee->department_name !!}</td>
                            <td>{!! $employee->costcenter !!}</td>
                            <td>{!! $employee->bank_account !!}</td>
                            <td>{!! $employee->level->credit !!}</td>
                            <td>
                                <a href="/employees/{!! $employee->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a>
                                <a href="/delete/employee/{!! $employee->id !!}"><i class="ace-icon fa fa-remove"></i></a>
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