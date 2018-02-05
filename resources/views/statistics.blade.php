@extends('layouts.app')

@section('title', '学生成绩总览')

@section('nav-bar')
    <li><a href="/"><span class="glyphicon glyphicon-search"></span>学生成绩查询 <span class="sr-only">(current)</span></a>
    </li>
    <li><a href="./addRecord"><span class="glyphicon glyphicon-record"></span>学生成绩录入</a></li>
    <li class="active"><a href="./statistics"><span class="glyphicon glyphicon-indent-left"></span>学生成绩统计</a></li>
    <li><a href="./addStatus"><span class="glyphicon glyphicon-plus"></span>添加学生学籍</a></li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-success">
                <div class="panel-heading">成绩总览</div>
                <div class="panel-body">
                    <p>这里给出各个科目的总情况。</p>

                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>#</th>
                            <th>科目名称</th>
                            <th>最高成绩</th>
                            <th>最高成绩(人数)</th>
                            <th>平均成绩</th>
                        </tr>
                        @foreach($data as $key=>$value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value['sub_name'] }}</td>
                                <td>{{ $value['max_num'] }}</td>
                                <td>{{ $value['max_person'] }}</td>
                                <td>{{ $value['avg_num'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
