@extends('tpl.master')
@section('content')
    {!! Form::model($department,
                                     array(
                                     'route'=>['departments.update',$department->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group has-warning">


                <label for="" class="col-sm-2 control-label">部门名称</label>
                <div class="col-sm-2">
                    {!! Form::text('name',$department->name,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                </div>




            </div>
            <div class="form-group has-info">
                <label for="" class="col-xs-2 control-label  ">公司</label>
                <div class="col-xs-2">
                    {!! Form::select('company_id',\App\Company::lists('name','id'),$department->company_id,['class'=>'form-control input-sm']) !!}
                </div>


                <label for="" class="col-xs-2 control-label">成本中心</label>
                <div class="col-xs-2">
                    {!! Form::text('costcenter',$department->costcenter ,['required','class'=>'form-control input-sm','pattern'=>'[0-9]{4}'])!!}
                </div>



            </div>




        </div>
    </div>


    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection