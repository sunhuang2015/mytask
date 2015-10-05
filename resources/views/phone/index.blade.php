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
                <i class="ace-icon fa fa-plus "></i> 新电话
            </button>





            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">电话号码</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'phones',
                                   'class'=>'form form-horizontal',
                                   )
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-warning">

                                        <label for="" class="col-sm-2 control-label">电话</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('number','',['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'number']) !!}
                                        </div>
                                        <span class="col-sm-4">
												<label class="pull-right inline">
                                                    <small class="muted ">均摊</small>

                                                    <input name="isShared" id="id-button-borders" checked="checked" type="checkbox" class="ace ace-switch ace-switch-5">
                                                    <span class="lbl middle"></span>
                                                </label>
                                        </span>


                                        <label for="" class="col-xs-2 control-label  ">类型</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('category_id',\App\PhoneCategory::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>

                                    </div>
                                    <div class="form-group has-info">
                                        <label for="" class="col-xs-2 control-label  ">公司</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>
                                        <label for="" class="col-xs-2 control-label">部门</label>
                                        <div class="col-xs-2">
                                            {!! Form::text('department_name','' ,['required','class'=>'form-control input-sm'])!!}
                                        </div>
                                        <label for="" class="col-xs-2 control-label  ">付款公司</label>
                                        <div class="col-xs-2">
                                            {!! Form::select('payment_company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
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


                    <th>号码</th>
                    <th>类别</th>
                    <th>公司</th>
                    <th>部门</th>
                    <th>均摊</th>
                    <th>激活</th>
                    <th>付款公司</th>
                    <th></th>

                </tr>

                </thead>
                <tbody>
                    @foreach($phones as $phone)
                        <tr>
                            <td>{!! $phone->number !!}</td>
                            <td>{!! $phone->category->name !!}</td>
                            <td>{!! $phone->company->name !!}</td>
                            <td>{!! $phone->department_name !!}</td>
                            <td>{!! $phone->isShared !!}</td>

                            <td>{!! $phone->isActived !!}</td>

                            <td>{!! $phone->paymentCompany->name !!}</td>
                            <td>
                                <a href="/phones/{!! $phone->id !!}/edit"><i class="ace-icon fa fa-edit"></i></a>
                                <a href="/delete/phone/{!! $phone->id !!}"><i class="ace-icon fa fa-remove"></i></a>
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