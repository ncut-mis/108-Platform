<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $month = date("n");
        $data1_1 = DB::table('per_week_schedules')->where('week','一')->where('start','09:00:00')->where('month',$month)->get();
        $data1_2 = DB::table('per_week_schedules')->where('week','一')->where('start','15:00:00')->where('month',$month)->get();
        $data1_3 = DB::table('per_week_schedules')->where('week','一')->where('start','18:00:00')->where('month',$month)->get();

        $data2_1 = DB::table('per_week_schedules')->where('week','二')->where('start','09:00:00')->where('month',$month)->get();
        $data2_2 = DB::table('per_week_schedules')->where('week','二')->where('start','15:00:00')->where('month',$month)->get();
        $data2_3 = DB::table('per_week_schedules')->where('week','二')->where('start','18:00:00')->where('month',$month)->get();

        $data3_1 = DB::table('per_week_schedules')->where('week','三')->where('start','09:00:00')->where('month',$month)->get();
        $data3_2 = DB::table('per_week_schedules')->where('week','三')->where('start','15:00:00')->where('month',$month)->get();
        $data3_3 = DB::table('per_week_schedules')->where('week','三')->where('start','18:00:00')->where('month',$month)->get();

        $data4_1 = DB::table('per_week_schedules')->where('week','四')->where('start','09:00:00')->where('month',$month)->get();
        $data4_2 = DB::table('per_week_schedules')->where('week','四')->where('start','15:00:00')->where('month',$month)->get();
        $data4_3 = DB::table('per_week_schedules')->where('week','四')->where('start','18:00:00')->where('month',$month)->get();

        $data5_1 = DB::table('per_week_schedules')->where('week','五')->where('start','09:00:00')->where('month',$month)->get();
        $data5_2 = DB::table('per_week_schedules')->where('week','五')->where('start','15:00:00')->where('month',$month)->get();
        $data5_3 = DB::table('per_week_schedules')->where('week','五')->where('start','18:00:00')->where('month',$month)->get();

        $data6_1 = DB::table('per_week_schedules')->where('week','六')->where('start','09:00:00')->where('month',$month)->get();
        $data6_2 = DB::table('per_week_schedules')->where('week','六')->where('start','15:00:00')->where('month',$month)->get();
        $data6_3 = DB::table('per_week_schedules')->where('week','六')->where('start','18:00:00')->where('month',$month)->get();

        $data7_1 = DB::table('per_week_schedules')->where('week','日')->where('start','09:00:00')->where('month',$month)->get();
        $data7_2 = DB::table('per_week_schedules')->where('week','日')->where('start','15:00:00')->where('month',$month)->get();
        $data7_3 = DB::table('per_week_schedules')->where('week','日')->where('start','18:00:00')->where('month',$month)->get();
        $staff=DB::table('staff')->get();
        session_start();
        $_SESSION['open']=0;
        $_SESSION['w1_1']=$data1_1;
        $_SESSION['w1_2']=$data1_2;
        $_SESSION['w1_3']=$data1_3;

        $_SESSION['w2_1']=$data2_1;
        $_SESSION['w2_2']=$data2_2;
        $_SESSION['w2_3']=$data2_3;

        $_SESSION['w3_1']=$data3_1;
        $_SESSION['w3_2']=$data3_2;
        $_SESSION['w3_3']=$data3_3;

        $_SESSION['w4_1']=$data4_1;
        $_SESSION['w4_2']=$data4_2;
        $_SESSION['w4_3']=$data4_3;

        $_SESSION['w5_1']=$data5_1;
        $_SESSION['w5_2']=$data5_2;
        $_SESSION['w5_3']=$data5_3;

        $_SESSION['w6_1']=$data6_1;
        $_SESSION['w6_2']=$data6_2;
        $_SESSION['w6_3']=$data6_3;

        $_SESSION['w7_1']=$data7_1;
        $_SESSION['w7_2']=$data7_2;
        $_SESSION['w7_3']=$data7_3;
        $_SESSION['staff']=$staff;

        return view('schedule',['staff' => $staff]);

    }
    public function add($id)
    {
        session_start();
        //start_尋找同個時段的另一個人是誰，判斷負責項目是否相同(有bug)

//        $data=DB::table('per_week_schedules')->where('id',$id);
//
//        foreach ($data as $ds)
//        {
//            $st=$ds->start;
//            $we=$ds->week;
//            $mo=$ds->month;
//        }
//
//        $data2=DB::table('per_week_schedules')->where('start',$st)->where('week',$we)->where('month',$mo);
//
//        foreach ($data2 as $d2s)
//        {
//            $an_staff=$d2s->staff_id;
//
//        }
//        if($an_staff!=null){//判斷人員
//        $data3=DB::table('staff')->where('id',$an_staff);
//        $data4=DB::table('staff')->where('id',$_SESSION['sid']);
//        foreach ($data3 as $d3s)
//        {
//            $an_staff_job=$d3s->job;
//
//        }
//        foreach ($data4 as $d4s)
//        {
//            $now_job=$d4s->job;
//
//        }
//
//        if($an_staff_job!=$now_job)
//         {
//        DB::table('per_week_schedules')->where('id',$id)->update(
//            [
//
//                'staff_id'=>$_SESSION['sid']
//
//
//            ]
//        );
//         }
//            //        echo "<script>alert('已新增該時段排班')</script>"; 有bug 提醒視窗跳不出來
//            return redirect()->route('schedule.check',['staff' => $_SESSION['sid']]);
//        }//end_尋找同個時段的另一個人是誰，判斷負責項目是否相同
//        else
            DB::table('per_week_schedules')->where('id',$id)->update(
                [

                    'staff_id'=>$_SESSION['sid']


                ]
            );
        //        echo "<script>alert('已新增該時段排班')</script>"; 有bug 提醒視窗跳不出來
        return redirect()->route('schedule.check',['staff' => $_SESSION['sid']]);
    }
    public function check($staff)
    {

        $data1_1 = DB::table('per_week_schedules')->where('week','一')->where('start','09:00:00')->get();
        $data1_2 = DB::table('per_week_schedules')->where('week','一')->where('start','15:00:00')->get();
        $data1_3 = DB::table('per_week_schedules')->where('week','一')->where('start','18:00:00')->get();
        $data2_1 = DB::table('per_week_schedules')->where('week','二')->where('start','09:00:00')->get();
        $data2_2 = DB::table('per_week_schedules')->where('week','二')->where('start','15:00:00')->get();
        $data2_3 = DB::table('per_week_schedules')->where('week','二')->where('start','18:00:00')->get();
        $data3_1 = DB::table('per_week_schedules')->where('week','三')->where('start','09:00:00')->get();
        $data3_2 = DB::table('per_week_schedules')->where('week','三')->where('start','15:00:00')->get();
        $data3_3 = DB::table('per_week_schedules')->where('week','三')->where('start','18:00:00')->get();
        $data4_1 = DB::table('per_week_schedules')->where('week','四')->where('start','09:00:00')->get();
        $data4_2 = DB::table('per_week_schedules')->where('week','四')->where('start','15:00:00')->get();
        $data4_3 = DB::table('per_week_schedules')->where('week','四')->where('start','18:00:00')->get();
        $data5_1 = DB::table('per_week_schedules')->where('week','五')->where('start','09:00:00')->get();
        $data5_2 = DB::table('per_week_schedules')->where('week','五')->where('start','15:00:00')->get();
        $data5_3 = DB::table('per_week_schedules')->where('week','五')->where('start','18:00:00')->get();
        $data6_1 = DB::table('per_week_schedules')->where('week','六')->where('start','09:00:00')->get();
        $data6_2 = DB::table('per_week_schedules')->where('week','六')->where('start','15:00:00')->get();
        $data6_3 = DB::table('per_week_schedules')->where('week','六')->where('start','18:00:00')->get();
        $data7_1 = DB::table('per_week_schedules')->where('week','日')->where('start','09:00:00')->get();
        $data7_2 = DB::table('per_week_schedules')->where('week','日')->where('start','15:00:00')->get();
        $data7_3 = DB::table('per_week_schedules')->where('week','日')->where('start','18:00:00')->get();
        $staff1=DB::table('staff')->get();
        session_start();

        $_SESSION['sid']=$staff;
        $_SESSION['w1_1']=$data1_1;
        $_SESSION['w1_2']=$data1_2;
        $_SESSION['w1_3']=$data1_3;

        $_SESSION['w2_1']=$data2_1;
        $_SESSION['w2_2']=$data2_2;
        $_SESSION['w2_3']=$data2_3;

        $_SESSION['w3_1']=$data3_1;
        $_SESSION['w3_2']=$data3_2;
        $_SESSION['w3_3']=$data3_3;

        $_SESSION['w4_1']=$data4_1;
        $_SESSION['w4_2']=$data4_2;
        $_SESSION['w4_3']=$data4_3;

        $_SESSION['w5_1']=$data5_1;
        $_SESSION['w5_2']=$data5_2;
        $_SESSION['w5_3']=$data5_3;

        $_SESSION['w6_1']=$data6_1;
        $_SESSION['w6_2']=$data6_2;
        $_SESSION['w6_3']=$data6_3;

        $_SESSION['w7_1']=$data7_1;
        $_SESSION['w7_2']=$data7_2;
        $_SESSION['w7_3']=$data7_3;
        $_SESSION['staff']=$staff1;

        return view('schedule_check');

    }
    public function remove($id)
    {
        session_start();
        DB::table('per_week_schedules')->where('id',$id)->update(
            [



                'staff_id'=>null


            ]
        );
//        echo "<script>alert('已刪除該時段排班')</script>"; 有bug 提醒視窗跳不出來
        return redirect()->route('schedule.check',['staff' => $_SESSION['sid']]);
    }

}
