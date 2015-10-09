@extends('tpl.master')
@section('content')
    {!! Form::model($taskform,
                                     array(
                                     'route'=>['taskforms.update',$taskform->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group has-warning">
                <input type="hidden" name="task_id" value="1">
                <label for="" class="col-sm-2 control-label">中文描述</label>
                <div class="col-sm-10">
                    {!! Form::select('device_id',\App\Device::lists('c_desc','id'),$taskform->device_id,['disable'] ) !!}
                </div>

            </div>



            <div class="form-group">
                <label for="" class="col-sm-2 control-label">数量</label>
                <div class="col-sm-10">
                    {!! Form::number('qty',$taskform->qty,['class'=>'form-control input-sm']) !!}
                </div>


            </div>



        </div>
    </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection