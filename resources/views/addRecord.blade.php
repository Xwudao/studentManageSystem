@extends('layouts.app')

@section('title', '增加学生成绩记录')

@section('nav-bar')
    <li><a href="/"><span class="glyphicon glyphicon-search"></span>学生成绩查询 <span class="sr-only">(current)</span></a></li>
    <li class="active"><a href="./addRecord"><span class="glyphicon glyphicon-record"></span>学生成绩录入</a></li>
    <li><a href="./statistics"><span class="glyphicon glyphicon-indent-left"></span>学生成绩统计</a></li>
    <li><a href="./addStatus"><span class="glyphicon glyphicon-plus"></span>添加学生学籍</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-info">
                <div class="panel-heading">学生成绩录入</div>
                <div class="panel-body">
                    @if(session('msg')!=null)
                        <div class="bg-max bg-success">{{ session('msg') }}</div>
                    @endif
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">学科：</label>
                            <select class="form-control" name="sub_name">
                                <option value="数学">数学</option>
                                <option value="英语">英语</option>
                                <option value="语文">语文</option>
                                <option value="C语言">C语言</option>
                                <option value="专业导论">专业导论</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">成绩：</label>
                            <input type="text" name="grade" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">学号：</label>
                            <input type="text" name="sid" class="form-control">
                        </div>
                        {{--<div class="form-group">
                            <label for="">管理员密码：</label>
                            <input type="text" name="password" class="form-control">
                        </div>--}}
                        <input class="form-control" type="submit" value="添加">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
