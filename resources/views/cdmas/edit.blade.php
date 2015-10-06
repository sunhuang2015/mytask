@extends('tpl.master')
@section('content')
    {!! Form::model($cdma,
                                     array(
                                     'route'=>['cdmas.update',$cdma->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group has-warning">

                    <label for="" class="col-sm-2 control-label">工号</label>
                    <div class="col-sm-2">
                        {!! Form::text('number',$cdma->employee_number,['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'number','disabled']) !!}
                    </div>
                    <label for="" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-2">
                        {!! Form::text('name',$cdma->employee_name,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                    </div>
                    <label for="" class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-2">
                        {!! Form::select('status_id',\App\Status::lists('name','id'),$cdma->status_id,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                    </div>




                </div>
                <div class="form-group has-info">
                    <label for="" class="col-xs-2 control-label  ">公司</label>
                    <div class="col-xs-2">
                        {!! Form::select('company_id',\App\Company::lists('name','id'),$cdma->company_id,['class'=>'form-control input-sm']) !!}
                    </div>


                    <label for="" class="col-xs-2 control-label">成本中心</label>
                    <div class="col-xs-2">
                        {!! Form::text('costcenter',$cdma->costcenter ,['required','class'=>'form-control input-sm','pattern'=>'[0-9]{4}'])!!}
                    </div>
                    <label for="" class="col-xs-2 control-label">部门</label>
                    <div class="col-xs-2">
                        {!! Form::text('department_name',$cdma->department_name ,['required','class'=>'form-control input-sm'])!!}
                    </div>


                </div>
                <div class="form-group">



                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">电话号码</label>
                    <div class="col-sm-10">
                        {!! Form::text('phone_number',$cdma->phone_number,['class'=>'form-control input-sm']) !!}
                    </div>


                </div>




            </div>
        </div>


        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection