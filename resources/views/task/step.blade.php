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
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tbl_step">
                    <thead>
                        <tr>
                            <th class="hidden-320">Name</th>
                            <th>Code</th>
                            <th>Icon</th>
                            <th>Edit</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($steps as $step)
                            <tr>
                                <td>{{$step->name}}</td>
                                <td>{{$step->code}}</td>
                                <td><span class="badge {{$step->icon}}">{{$step->name}}</span></td>
                                <td><a href="/taskstep/{{$step->id}}"><i class="ace-icon fa fa-edit fa-2x"></i></a></td>
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
            $("#tbl_step").wrap("<div class='dataTables_borderWrap' />")
                    .dataTable({
                        bAutoWidth:false//for better responsiveness

                    });
        }); </script>
    </script>
@endsection