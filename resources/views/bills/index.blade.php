@extends('tpl.master')
@section('content')
    <div class="page-header">
        <h1>
            月账单
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                运营商 &amp;   <button type="button" class="btn  btn-purple btn-xs  " data-toggle="modal" data-target="#uploadModel">
                    <i class="ace-icon fa fa-plus "></i> 上传月账单
                </button>
            </small>
            <h6>
                {!! Form::open(array('route'=>'bills.index')) !!}
               {!! Form::label('选择月份') !!}
                {!! Form::select('months',App\BillList::distinct(['months'])->get(['months'])->lists('months','months'))!!}
                {!!Form::submit()!!}
                {!! Form::close()!!}
            </h6>

        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <!-- Button trigger modal -->









            <!-- Upload Model-->
            <div class="modal fade" id="uploadModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">上传</h4>
                        </div>
                        {!! Form::open(
                                   array(
                                   'url'=>'upload/bill',
                                   'class'=>'form form-horizontal',
                                   'files'=>true)
                           ) !!}
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group has-info">
                                        <label for="" class="col-xs-2 control-label  ">公司</label>
                                        <div class="col-xs-4">
                                            {!! Form::select('company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                        </div>






                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-xs-2 control-label  ">账单文件</label>
                                        <div class="col-xs-4">
                                            {!! Form::file('billfile') !!}
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
            <!-- end upload Model -->
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

                    <th class="hidden-320">电话号码</th>
                    <th>姓名</th>

                    <th>公司</th>
                    <th>记账月</th>
                    <th>费用</th>
                    <th>备注</th>


                </tr>

                </thead>
                <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <td>{!! $bill->phone !!}</td>
                                <td>{!! $bill->name !!}</td>
                                <td>{!! $bill->company->name !!}</td>
                                <td>{!! $bill->months !!}</td>
                                <td>{!! $bill->fee !!}</td>
                                <td>{!! $bill->remark !!}</td>
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