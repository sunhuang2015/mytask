@extends('tpl.master')
@section('content')
    <div class="page-header">
        <h1>

            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
               网络机柜
                        {!! Form::open(['url'=>'layouts']) !!}
                        {!! Form::select('company_id',\App\Company::lists('name','id')) !!}
                       {!! Form::submit('选择机柜',['class'=>'btn btn-purple btn-xs']) !!}
                        {!! Form::close() !!}
            </small>
        </h1>
    </div>


    <div class="row">
        <div class="col-xs-12">
            @foreach($racks as $rack)
                     <div class="col-xs-6 col-sm-4 pricing-box">
                <div class="widget-box widget-color-orange">
                    <div class="widget-header">
                        <h5 class="widget-title bigger lighter">机柜编号{!! $rack->name !!}</h5>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <ul class="list-unstyled spaced2">
                            @for($i=1;$i<=$rack->size;$i++)
                                <li>
                                    @if($rack->networkDevice->count()>0)
                                            @foreach($rack->networkDevice->all() as $device)
                                                @if($i==($device->location))
                                                    <span>   {!! $i !!}

                                                        <img src="/image/network/{!! $device->model->name !!}.PNG" width=110 heigh=15 align="right" alt="{!! $device->ip !!}">

                                                        - <a href="http://10.201.33.112/cisco/switches/{!! $device->ip !!}.html" >{!! $device->ip !!}   </a>
                                                    </span>
                                                @else

                                                @endif

                                            @endforeach
                                    @else

                                        @endif
                                </li>
                                @endfor



                            </ul>

                            <hr>
                            <div class="price">
                                    {!! $rack->building !!}
                                <small>{!! $rack->floor !!}</small>
                            </div>
                        </div>

                        <div>
                            <a href="#" class="btn btn-block ">
                                <i class="ace-icon fa  fa-hdd-o fa-2x bigger-110"></i>
                                <span>{!! $rack->company->name !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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