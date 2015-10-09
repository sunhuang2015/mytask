@extends('tpl.master')
@section('content')
    {!! Form::model($device,
                                     array(
                                     'route'=>['devices.update',$device->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group has-warning">
                <input type="hidden" name="status_id" value="1">
                <label for="" class="col-sm-2 control-label">中文描述</label>
                <div class="col-sm-4">
                    {!! Form::text('e_desc',$device->c_desc,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                </div>
                <label for="" class="col-sm-2 control-label">英文描述</label>
                <div class="col-sm-4">
                    {!! Form::text('c_desc',$device->e_desc,['class'=>'form-control col-sm-2 input-sm',' required autofocus']) !!}
                </div>
            </div>

            <div class="form-group has-warning">
                <input type="hidden" name="status_id" value="1">
                <label for="" class="col-sm-2 control-label">中文品牌</label>
                <div class="col-sm-4">
                    {!! Form::text('e_brand',$device->c_brand,['class'=>'form-control col-sm-2 input-sm','required autofocus'] ) !!}
                </div>
                <label for="" class="col-sm-2 control-label">英文品牌</label>
                <div class="col-sm-4">
                    {!! Form::text('c_brand',$device->e_brand,['class'=>'form-control col-sm-2 input-sm',' required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">型号</label>
                <div class="col-sm-4">
                    {!! Form::text('model',$device->model,['class'=>'form-control input-sm']) !!}
                </div>

                <label for="" class="col-sm-2 control-label">单位</label>
                <div class="col-sm-4">
                    {!! Form::text('unit',$device->unit,['class'=>'form-control input-sm']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">特殊要求</label>
                <div class="col-sm-10">
                    {!! Form::text('spec',$device->spec,['class'=>'form-control input-sm']) !!}
                </div>


            </div>



        </div>
    </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection