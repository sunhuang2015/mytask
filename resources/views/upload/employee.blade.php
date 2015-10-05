@extends('tpl.master')
@section('content')

    {!! Form::open(
        [
        'url'=>'/upload/employee',
        'files'=>true,
        'method'=>'post'
        ]
    ) !!}

        <div class="form-group">
            {!! Form::label('Select File') !!}
            {!! Form::file('attachment') !!}
        </div>
        {!! Form::submit('Upload') !!}

    {!! Form::close() !!}
    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <p>{!!session('message') !!}</p>

        </div>
    @endif
    @if (session()->has('messages'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

           @foreach(session('messages') as $m=>$v)
                  <li>{!! $m !!}-{!! $v !!}</li>
            @endforeach
        </div>
    @endif
@endsection