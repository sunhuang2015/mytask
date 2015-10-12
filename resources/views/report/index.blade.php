<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{!! $company_name !!}</title>
</head>
<body>


        <table >
            <thead>
            <tr>


                <th>工号</th>
                <th>姓名</th>
                <th>公司</th>
                <th>部门</th>
		<th>电话号码</th>
                <th>成本中心</th>
                <th>月份</th>
                <th>津贴标准</th>
                <th>实际报销额度</th>
                <th>银行账号</th>
                <th>银行</th>

            </tr>

            </thead>
            <tbody>
            @foreach($mobilefees as $mobilefee)
                <tr>
                    <td>{!! $mobilefee->employee_number !!}</td>
                    <td>{!! $mobilefee->employee->name !!}</td>
                    <td>{!! $mobilefee->company->name !!}</td>
                    <td>{!! $mobilefee->employee->department_name !!}</td>
		   <td>{!! $mobilefee->employee->phone_number !!}</td>
                    <td>{!! $mobilefee->employee->costcenter !!}</td>
                    <td>{!! $mobilefee->months !!}</td>
                    <td>{!! \App\Employee::find($mobilefee->employee_id)->level->credit !!}</td>
                    <td>

                        {!! $mobilefee->fee !!}

                    </td>
                    <td>[{!! $mobilefee->employee->bank_account !!}]</td>
                    <td>{!! $mobilefee->employee->bank_info !!}</td>


                </tr>
            @endforeach
            </tbody>
        </table>

</body>
</html>


