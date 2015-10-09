<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RFQ form (for requestor)</title>
</head>
<body>
<table>
    <thead>
        <tr>

            <th>Requestor</th>
            <th>Requestor contact number	</th>
            <th>Segment</th>
            <th>Project</th>
            <th>Generic P/N</th>
            <th>Product Description(English)</th>
            <th>Product Description (Chinese)</th>
            <th>Brand</th>
            <th>"Model
                Number"</th>
            <th>Spec</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Last SC</th>
            <th>Last Purchase Date</th>
            <th>Last Purchase Price	Remark</th>

        </tr>
        <tr>


            <th style="background: cornflowerblue">申请人</th>
            <th style="background-color:#C0C0C0">申请人联系电话</th>
            <th>事业部</th>
            <th>项目</th>
            <th>公用料号</th>
            <th>产品描述（英文）</th>
            <th>产品描述（中文）</th>
            <th>品牌</th>
            <th>型号</th>
            <th>规格</th>
            <th>数量</th>
            <th>单位</th>
            <th>上次采购单号</th>
            <th>上次采购日期</th>
            <th>上次采购单价</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{!! $task->applicant !!}</th>
            <th>{!! $task->phone!!}</th>
            <th>{!! $task->company->name !!} - {!! $task->costcenter !!}</th>
            <th>{!! $task->name !!}</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($taskforms as $taskform)
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>


            </td>

            <td >{!! $taskform->device->e_desc !!}</td>
            <td>{!! $taskform->device->c_desc !!}</td>
            <td>{!! $taskform->device->c_brand !!}</td>
            <td>{!! $taskform->device->model !!}</td>
            <td>{!! $taskform->device->spec !!}</td>
            <td>{!! $taskform->qty !!}</td>
            <td>{!! $taskform->device->unit !!}</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>

    </tfoot>


</table>
<p>
   <p>备注：</p>
    <p>1、如有图片、图纸，请附上；</p>
    <p>2、如有费用控制要求，须注明；</p>
    <p>3、如对公用料号不清楚，请咨询IDM采购工程师；</p>
    <p>4、须明确定义规格，让专业供应商能根据规格报价。</p>
    <p>5、可在备注栏写明用途。</p>
</p>
</body>
</html>