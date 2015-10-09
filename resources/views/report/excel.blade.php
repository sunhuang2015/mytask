<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>


<table>
    <thead>
        <td>工号</td>
        <td>姓名</td>
        <td>公司</td>
        <td>部门</td>
        <td>成本中心</td>
        <td>月份</td>
        <td>费用</td>
        <td>银行账号</td>
    </thead>
    <tbody>
    @foreach($mobilefees as $mobilefee)
        <tr>
            <td>{!! $mobilefee->employee_number !!}</td>
            <td>{!! $mobilefee->employee->name !!}</td>
            <td>{!! $mobilefee->company->name !!}</td>
            <td>{!! $mobilefee->employee->department_name !!}</td>
            <td>{!! $mobilefee->employee->costcenter !!}</td>
            <td>{!! $mobilefee->months !!}</td>
            <td>{!! $mobilefee->fee !!}</td>
            <td>
                {!! $mobilefee->bank_account !!}
            </td>



        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>