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
            {!! Form::open(array('route'=>'mobilefees.index')) !!}
                {!! Form::select('months',App\MobileFees::distinct(['months'])->get(['months'])->lists('months','months'))!!}
                {!!Form::submit()!!}
            {!! Form::close()!!}
            <table class="display table table-striped table-bordered compact " cellspacing="0" width="100%" id="tbl_tasks">
                <thead>
                <tr>


                    <th>工号</th>
                    <th>姓名</th>
                    <th>公司</th>
                    <th>成本中心</th>
                    <th>月份</th>
                    <th>费用</th>
                    <th></th>

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
                            <td>
                                {!! Form::model($mobilefee,[
                                    'route'=>['mobilefees.update',$mobilefee->id],
                                    'method'=>'put'
                                    ]
                                    ) !!}
                                {!! Form::text('fee',$mobilefee->fee,['class'=>'form-control input-sm']) !!}
                                {!! Form::submit() !!}
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