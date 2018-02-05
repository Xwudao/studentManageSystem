@extends('layouts.app')

@section('title', '成绩详情页')

@section('nav-bar')
    <li><a href="/"><span class="glyphicon glyphicon-search"></span>学生成绩查询 <span class="sr-only">(current)</span></a>
    </li>
    <li><a href="./addRecord"><span class="glyphicon glyphicon-record"></span>学生成绩录入</a></li>
    <li><a href="./statistics"><span class="glyphicon glyphicon-indent-left"></span>学生成绩统计</a></li>
    <li><a href="./addStatus"><span class="glyphicon glyphicon-plus"></span>添加学生学籍</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-push-2 col-md-7">
            <div class="panel panel-success">
                <div class="panel-heading"><b>{{ $data['name'] }}</b> 的详情成绩查询</div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>#</th>
                            <th>科目名称</th>
                            <th>科目成绩</th>
                        </tr>
                        @foreach($data['data'] as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value['sub_name'] }}</td>
                                <td>{{ $value['sub_grade'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottom')

@endsection
