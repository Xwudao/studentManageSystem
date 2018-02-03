@extends('layouts.app')

@section('title', '首页')

@section('nav-bar')
    <li class="active"><a href="/"><span class="glyphicon glyphicon-search"></span>学生成绩查询 <span class="sr-only">(current)</span></a></li>
    <li><a href="./addRecord"><span class="glyphicon glyphicon-record"></span>学生成绩录入</a></li>
    <li><a href="./statistics"><span class="glyphicon glyphicon-indent-left"></span>学生成绩统计</a></li>
    <li><a href="./sort"><span class="glyphicon glyphicon-sort"></span>学生成绩排序</a></li>
    <li><a href="./addStatus"><span class="glyphicon glyphicon-plus"></span>添加学生学籍</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-push-2 col-md-7">
            <div class="panel panel-info">
                <div class="panel-heading">公告</div>
                <div class="panel-body">
                    <p>欢迎来到无道学生成绩管理系统。</p>
                    <p>本系统按照C语言学生成绩管理系统的相关功能及模式开发。</p>
                    <p>本系统在GitHub上开源：<a href="https://github.com/Xwudao/studentManageSystem" target="_blank">https://github.com/Xwudao/studentManageSystem</a></p>
                    <p><b>系统特征：</b></p>
                    <p>1.采用现代化框架Laravel以及流行css框架Bootstrap。</p>
                    <p>2.PC端以及手机端通用，响应式设计。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-push-2 col-md-7">
            <div class="panel panel-warning">
                <div class="panel-heading">学生成绩查询</div>
                <div class="panel-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">请输入姓名：</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">请输入身份证号码：</label>
                            <input type="text" name="id_card" class="form-control">
                        </div>
                        <input class="form-control" type="submit" value="查询">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottom')

@endsection
