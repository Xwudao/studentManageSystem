@extends('layouts.app')

@section('title', '学生成绩排序')

@section('nav-bar')
    <li><a href="/"><span class="glyphicon glyphicon-search"></span>学生成绩查询 <span class="sr-only">(current)</span></a></li>
    <li><a href="./addRecord"><span class="glyphicon glyphicon-record"></span>学生成绩录入</a></li>
    <li><a href="./statistics"><span class="glyphicon glyphicon-indent-left"></span>学生成绩统计</a></li>
    <li class="active"><a href="./sort"><span class="glyphicon glyphicon-sort"></span>学生成绩排序</a></li>
    <li><a href="./addStatus"><span class="glyphicon glyphicon-plus"></span>添加学生学籍</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-info">
                <div class="panel-heading">学生成绩排序</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection
