@extends('tpl.master')
@section('content')
    {!! Form::model($phone,
                                     array(
                                     'route'=>['phones.update',$phone->id],
                                     'class'=>'form form-horizontal',
                                     'method'=>'put'
                                     )
                             ) !!}


    <div class="row">
        <div class="col-sm-12">
            <div class="form-group has-warning">

                <label for="" class="col-sm-2 control-label">电话</label>
                <div class="col-sm-2">
                    {!! Form::text('number',$phone->number,['class'=>'form-control col-sm-2 input-sm',' required autofocus','id'=>'number','disabled']) !!}
                </div>
            


                <label for="" class="col-xs-2 control-label  ">类型</label>
                <div class="col-xs-2">
                    {!! Form::select('category_id',\App\PhoneCategory::lists('name','id'),$phone->category_id,['class'=>'form-control input-sm']) !!}
                </div>

            </div>
            <div class="form-group has-info">
                <label for="" class="col-xs-2 control-label  ">公司</label>
                <div class="col-xs-2">
                    {!! Form::select('company_id',\App\Company::lists('name','id'),$phone->company_id,['class'=>'form-control input-sm']) !!}
                </div>
                <label for="" class="col-xs-2 control-label  ">付款公司</label>
                <div class="col-xs-2">
                    {!! Form::select('company_id',\App\Company::lists('name','id'),$phone->payment_company_id,['class'=>'form-control input-sm']) !!}
                </div>


                <label for="" class="col-xs-2 control-label">部门</label>
                <div class="col-xs-2">
                    {!! Form::text('department_name',$phone->department_name ,['required','class'=>'form-control input-sm'])!!}
                </div>


            </div>

            <div class="form-group box">
                 <span class="col-sm-4">
												<label class="pull-right inline">
                                                    <small class="muted ">均摊</small>

                                                    <input name="isShared" id="id-button-borders" @if($phone->isShared) checked="" @endif  type="checkbox" class="ace ace-switch ace-switch-5">
                                                    <span class="lbl middle"></span>
                                                </label>
                 </span><span class="col-sm-4">
												<label class="pull-right inline">
                                                    <small class="muted ">使用中</small>

                                                    <input name="isActived" id="id-button-borders" @if(!$phone->isShared) checked="" @endif  type="checkbox" class="ace ace-switch ace-switch-5">
                                                    <span class="lbl middle"></span>
                                                </label>
                 </span>
            </div>
            <div class="form-group">



            </div>






        </div>
    </div>


    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">存盘</button>

    {!! Form::close() !!}

@endsection