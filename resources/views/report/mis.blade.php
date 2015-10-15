<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MIS</title>

</head>
<body>


<table border="1">
            <thead >
            <tr>
                <td width="200"><img src="{!!  base_path() !!}/public/logo/multek_logo.png" alt=""></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


                <td><h5>F/ADM-DAP-11B</h5></td>
                <td></td>
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td><h2>    MIS&IT
                            限额通信津贴报销表</h2> </td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>

            </tr>
            <tr>

                <th width="6">序号</th>
                <th width="8">部门</th>
                <th width="8">姓名</th>
                <th width="10" align="left">工号</th>



		        <th width="25">电话号码</th>

                <th width="10">报销年月</th>
                <th width="12">津贴标准</th>
                <th width="12">实际报销</th>

            </tr>

            </thead>
            <tbody>

            <?php $i=0;?>
            @foreach($mobilefees as $mobilefee)
                <tr>
                    <?php
                            $i=$i+1;
                            ?>
                    <td>{!! $i !!}</td>
                        <td align="left">{!! $mobilefee->employee->department_name !!}</td>
                        <td align="left">{!! $mobilefee->employee->name !!}</td>
                    <td align="left">{!! $mobilefee->employee_number !!}</td>



		   <td align="left">{!! $mobilefee->employee->phone_number !!}</td>

                    <td align="left">{!! $mobilefee->months !!}</td>
                    <td align="left">{!! \App\Employee::find($mobilefee->employee_id)->level->credit !!}</td>
                    <td align="left">

                        {!! $mobilefee->fee!!}

                    </td>



                </tr>
            @endforeach
            <tr>

            </tr>
            <tr>
                <td></td>
                <td></td><td></td>
                <td></td>
                <td></td>



                <td><h3>Total: {!! $sum !!}</h3></td>
                <td></td>
                <td></td>
            </tr>
            <tr></tr>
            <tr>

            </tr>

            </tbody>
        </table>

</body>
</html>


