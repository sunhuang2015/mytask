@extends('tpl.master')
@section('content')
    {!! Form::model($device,
                                     array(
                                     'route'=>['networkdevices.update',$device->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group has-warning">
                <input type="hidden" name="status_id" value="1">
                <label for="" class="col-sm-2 control-label">设备</label>
                <div class="col-sm-4">
                    {!! Form::text('name',$device->name,['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'name']) !!}
                </div>
                <label for="" class="col-sm-2 control-label">IP</label>
                <div class="col-sm-4">
                    {!! Form::text('ip',$device->ip,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                </div>



            </div>
            <div class="form-group has-info">
                <label for="" class="col-xs-2 control-label  ">公司</label>
                <div class="col-xs-4">
                    {!! Form::select('company_id',\App\Company::lists('name','id'),$device->company_id,['class'=>'form-control input-sm']) !!}
                </div>


                <label for="" class="col-xs-2 control-label">型号</label>
                <div class="col-xs-4">
                    {!! Form::select('model_id',\App\NetworkModel::lists('name','id'),$device->model_id,['class'=>'form-control input-sm']) !!}
                </div>



            </div>
            <div class="form-group">



            </div>
            <div class="form-group">
                <label for="" class="col-xs-2 control-label">机柜</label>
                <div class="col-xs-4">
                    {!! Form::select('rack_id',\App\Rack::lists('name','id'),$device->rack_id,['class'=>'form-control input-sm']) !!}
                </div>
                <label for="" class="col-sm-2 control-label">位置</label>
                <div class="col-sm-4">
                    {!! Form::text('location',$device->location,['class'=>'form-control input-sm']) !!}
                </div>


            </div>





        </div>
    </div>


    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection