@extends('tpl.master')
@section('content')
    {!! Form::model($employee,
                                     array(
                                     'route'=>['employees.update',$employee->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group has-warning">

                    <label for="" class="col-sm-2 control-label">工号</label>
                    <div class="col-sm-2">
                        {!! Form::text('number',$employee->number,['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'number','disabled']) !!}
                    </div>
                    <label for="" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-2">
                        {!! Form::text('name',$employee->name,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                    </div>


                    <label for="" class="col-xs-2 control-label  ">类型</label>
                    <div class="col-xs-2">
                        {!! Form::select('category_id',\App\EmployeeCategory::lists('name','id'),$employee->category_id,['class'=>'form-control input-sm']) !!}
                    </div>

                </div>
                <div class="form-group has-info">
                    <label for="" class="col-xs-2 control-label  ">公司</label>
                    <div class="col-xs-2">
                        {!! Form::select('company_id',\App\Company::lists('name','id'),$employee->company_id,['class'=>'form-control input-sm']) !!}
                    </div>


                    <label for="" class="col-xs-2 control-label">成本中心</label>
                    <div class="col-xs-2">
                        {!! Form::text('costcenter',$employee->costcenter ,['required','class'=>'form-control input-sm','pattern'=>'[0-9]{4}'])!!}
                    </div>
                    <label for="" class="col-xs-2 control-label">部门</label>
                    <div class="col-xs-2">
                        {!! Form::text('department_name',$employee->department_name ,['required','class'=>'form-control input-sm'])!!}
                    </div>


                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">级别</label>
                    <div class="col-xs-2">
                        {!! Form::select('level_id',\App\EmployeeLevel::lists('name','id'),$employee->level_id,['class'=>'form-control input-sm']) !!}
                    </div>


                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">电话号码</label>
                    <div class="col-sm-10">
                        {!! Form::text('phone_number',$employee->phone_number,['class'=>'form-control input-sm']) !!}
                    </div>


                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">银行账号</label>
                    <div class="col-sm-10">
                        {!! Form::number('bank_account',$employee->bank_account,['class'=>'form-control input-sm']) !!}
                    </div>


                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">银行</label>
                    <div class="col-sm-10">
                        {!! Form::text('bank_info',$employee->bank_info,['class'=>'form-control input-sm']) !!}
                    </div>


                </div>



            </div>
        </div>


        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection