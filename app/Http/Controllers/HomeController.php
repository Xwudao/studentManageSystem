<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //首页，也即查询页
    public function index()
    {
        return view('index');
    }

    //查询操作
    public function query(Request $request)
    {
        $sid = $request->input('sid');
        $id_card = $request->input('id_card');
        //如果表单没有填写
        if (!$sid || !$sid || !$id_card) {
            $request->session()->flash('msg', '请输入完整哦！');
            return redirect('./');
        }
        //身份证号码与学号不匹配
        $dbRes = DB::table('student_info')->where(['sid' => $sid, 'id_card' => $id_card])->first();
        if (!$dbRes) {
            $request->session()->flash('msg', '抱歉，你输入的学号与身份证号码不匹配!');
            return redirect('./');
        } else {
            $user_name = $dbRes->name;//记录一下名字
            $all_num = DB::table('student_subject')->where('sid', $sid)->count();
            $dbRes = DB::table('student_subject')->where('sid', $sid)->get();
            $data_array = array();//初始化

            if ($all_num <= 0) {
                $request->session()->flash('msg', '抱歉，您查询的记录为0 !');
                return redirect('./');
            }


            foreach ($dbRes as $key => $value) {
                $data_array['name'] = $user_name;
                $data_array['data'][$key]['sub_name'] = $value->sub_name;
                $data_array['data'][$key]['sub_grade'] = $value->sub_grade;
            }

            return view('./info', ['data' => $data_array]);
        }

    }

    //添加记录的页面
    public function addRecord()
    {
        return view('addRecord');
    }

    //添加学生成绩记录
    public function record(Request $request)
    {
        $sub_name = $request->input('sub_name');
        $sid = $request->input('sid');
        $grade = $request->input('grade');
        //如果表单没有填写
        if (!$sub_name || !$sid || !$grade) {
            $request->session()->flash('msg', '请输入完整哦！');//用此方法(flash)是一次性的，用完即消去
            return redirect('./addRecord');
        }

        //如果系统没有该生信息
        $dbRes = DB::table('student_info')->where('sid', $sid)->first();
        if (!$dbRes) {
            $request->session()->flash('msg', '抱歉，系统暂无该生的信息(学号：' . $sid . '), 您可以 注册学籍 !');
            return redirect('./addRecord');
        }

        //该科的成绩已经录了
        $dbRes = DB::table('student_subject')->where(['sid' => $sid, 'sub_name' => $sub_name])->first();
        if ($dbRes != null) {
            $request->session()->flash('msg', '很抱歉，该生的 ' . $sub_name . ' 成绩(' . $grade . ')已经在数据库中!');
            return redirect('./addRecord');
        }

        //反之，没有录入
        $dbRes = DB::table('student_subject')->insert(['sub_grade' => $grade, 'sid' => $sid, 'sub_name' => $sub_name]);
        if ($dbRes) {
            $request->session()->flash('msg', '录入成功!');
        } else {
            $request->session()->flash('msg', '录入失败!  系统错误!');
        }
        return redirect('./addRecord');
    }

    //统计页
    public function statistics()
    {
        $data_array = array();
        //数学
        $max_num = DB::table('student_subject')->where(['sub_name' => '数学'])->max('sub_grade');
        $avg_num = DB::table('student_subject')->where(['sub_name' => '数学'])->avg('sub_grade');
        $max_person = DB::table('student_subject')->where(['sub_grade' => $max_num])->count();
        $data_array[1]['max_num'] = $max_num;
        $data_array[1]['sub_name'] = '数学';
        $data_array[1]['avg_num'] = $avg_num;
        $data_array[1]['max_person'] = $max_person;
        //英语
        $max_num = DB::table('student_subject')->where(['sub_name' => '英语'])->max('sub_grade');
        $avg_num = DB::table('student_subject')->where(['sub_name' => '英语'])->avg('sub_grade');
        $max_person = DB::table('student_subject')->where(['sub_grade' => $max_num])->count();
        $data_array[2]['max_num'] = $max_num;
        $data_array[2]['sub_name'] = '英语';
        $data_array[2]['avg_num'] = $avg_num;
        $data_array[2]['max_person'] = $max_person;
        //语文
        $max_num = DB::table('student_subject')->where(['sub_name' => '语文'])->max('sub_grade');
        $avg_num = DB::table('student_subject')->where(['sub_name' => '语文'])->avg('sub_grade');
        $max_person = DB::table('student_subject')->where(['sub_grade' => $max_num])->count();
        $data_array[3]['max_num'] = $max_num;
        $data_array[3]['sub_name'] = '语文';
        $data_array[3]['avg_num'] = $avg_num;
        $data_array[3]['max_person'] = $max_person;
        //C语言
        $max_num = DB::table('student_subject')->where(['sub_name' => 'C语言'])->max('sub_grade');
        $avg_num = DB::table('student_subject')->where(['sub_name' => 'C语言'])->avg('sub_grade');
        $max_person = DB::table('student_subject')->where(['sub_grade' => $max_num])->count();
        $data_array[4]['max_num'] = $max_num;
        $data_array[4]['sub_name'] = 'C语言';
        $data_array[4]['avg_num'] = $avg_num;
        $data_array[4]['max_person'] = $max_person;
        //专业导论
        $max_num = DB::table('student_subject')->where(['sub_name' => '专业导论'])->max('sub_grade');
        $avg_num = DB::table('student_subject')->where(['sub_name' => '专业导论'])->avg('sub_grade');
        $max_person = DB::table('student_subject')->where(['sub_grade' => $max_num])->count();
        $data_array[5]['max_num'] = $max_num;
        $data_array[5]['sub_name'] = '专业导论';
        $data_array[5]['avg_num'] = $avg_num;
        $data_array[5]['max_person'] = $max_person;
//        dd($data_array);
        return view('statistics', ['data' => $data_array]);
    }

    //排序
    public function sort(Request $request,$sub_name = '语文')
    {
        $sub_arr = array(
            '语文',
            '数学',
            '英语',
            'C语言',
            '专业导论'
        );

        if (!in_array($sub_name, $sub_arr)) {
            $request->session()->flash('msg','您的科目选择错误');
            return view('sort');
        }

    }

    //添加学籍页面
    public function addStatus()
    {
        return view('addStatus');
    }


    //添加学籍操作
    public function addStatus2(Request $request)
    {
        $name = $request->input('name');
        $sid = $request->input('sid');
        $id_card = $request->input('id_card');

        //如果没有填写表单
        if (!$name || !$sid || !$id_card) {
            $request->session()->flash('msg', '请输入完整哦！');//用此方法(flash)是一次性的，用完即消去
            return redirect('./addStatus');
        }

        //以下检测身份证号码
        $dbRes = DB::table('student_info')->where('id_card', $id_card)->first();
        if ($dbRes != null) {
//            return redirect('./addStatus')->with(['msg'=>'用户名已存在.']);
            $request->session()->flash('msg', '身份证号码已存在!');//用此方法(flash)是一次性的，用完即消去
            return redirect('./addStatus');
        }

        //以下检测学号
        $dbRes = DB::table('student_info')->where('sid', $sid)->first();
        if ($dbRes != null) {
            $request->session()->flash('msg', '学籍已存在!');
            return redirect('./addStatus');
        } else {
            $dbRes = DB::table('student_info')->insert(['id_card' => $id_card, 'sid' => $sid, 'name' => $name]);
            if ($dbRes) {
                $request->session()->flash('msg', '添加学籍成功!');
            } else {
                $request->session()->flash('msg', '添加学籍失败!  系统错误!');
            }
            return redirect('./addStatus');
        }


    }
}
