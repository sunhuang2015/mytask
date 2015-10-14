<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="form-group has-info">
   <label for="" class="col-xs-2 control-label">Name</label>
   <div class="col-xs-4">
      {!! Form::select('name',\App\Company::Name('name','id'),null,['class'=>'form-control input-sm']) !!}
   </div>
</div>

</body>
</html>