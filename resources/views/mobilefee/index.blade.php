@extends('tpl.master')
@section('content')
    <div class="page-header">
        <h1>
            {!! session('months') !!}
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
             报销
            </small>
        </h1>
    </div>


    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(array('route'=>'mobilefees.index')) !!}
                {!! Form::select('months',App\MobileFees::distinct(['months'])->get(['months'])->lists('months','months'))!!}
                {!!Form::submit()!!}
            {!! Form::close()!!}

            <?php
                $months=App\MobileFees::distinct(['months'])->get(['months']);
                    ?>
            @foreach($months as $month)
                <a href="/report/{!! $month->months !!}">{!! $month->months !!}</a>
            @endforeach
            <a href="/reports/{!! session('months') !!}/MIS" class="btn btn-xs purple">{!! session('months') !!}_MIS_报销表</a>
            <table class="display table table-striped table-bordered compact " cellspacing="0" width="100%" id="tbl_tasks">
                <thead>
                <tr>


                    <th width="10">工号</th>
                    <th width="15">姓名</th>
                    <th width="8">公司</th>
                    <th width="20"> 部门</th>
                    <th width="10">成本中心</th>
                    <th width="30">月份</th>
                    <th width="80">费用</th>
                    <th width="20">?更新</th>


                </tr>

                </thead>
                <tbody>
                    @foreach($mobilefees as $mobilefee)
                        <tr>
                            <td>{!! $mobilefee->employee_number !!}</td>
                            <td>{!! $mobilefee->employee->name !!}</td>
                            <td>{!! $mobilefee->company->name !!}</td>
                            <td>{!! $mobilefee->employee->department_name !!}</td>
                            <td>{!! $mobilefee->employee->costcenter !!}</td>
                            <td>{!! $mobilefee->months !!}</td>

                            <td >
                                {!! Form::model($mobilefee,[
                                    'route'=>['mobilefees.update',$mobilefee->id],
                                    'method'=>'put',
                                    'class'=>'form-inline'
                                    ]
                                    ) !!}
                                <div class="form-group">
                                    {!! Form::text('fee',$mobilefee->fee,['class'=>'form-control input-sm col-xs-1','precision'=>"2"]) !!}
                                    {!! Form::submit('修改',['class'=>"btn btn-xs"]) !!}
                                </div>
                                {!! Form::close() !!}
                                @if (session()->has('message'))
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                        <p>{!!session('message') !!}</p>

                                    </div>
                                @endif
                            </td>
                            <td>{!! Carbon\Carbon::now()->diffInHours($mobilefee->updated_at) !!}小时
                                {!! Carbon\Carbon::now()->diffInDays($mobilefee->updated_at) !!}天</td>





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