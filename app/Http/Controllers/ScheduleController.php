<?php

namespace App\Http\Controllers;

use App\Models\PerWeekSchedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Element;

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
        //start_尋找同個時段的另一個人是誰，判斷負責項目是否相同

        $data=DB::table('per_week_schedules')->where('id',$id)->get();

        foreach ($data as $ds)
        {
            $st=$ds->start;
            $we=$ds->week;
            $mo=$ds->month;
        }

        $data2=DB::table('per_week_schedules')->where('start',$st)->where('week',$we)->where('month',$mo)->get();

        foreach ($data2 as $d2s)
        {
            $an_staff=$d2s->staff_id;

        }
        if($an_staff!=null){//判斷該時段是否有人了
        $data3=DB::table('staff')->where('id',$an_staff)->get();
        $data4=DB::table('staff')->where('id',$_SESSION['sid'])->get();
        foreach ($data3 as $d3s)
        {
            $an_staff_job=$d3s->job;

        }
        foreach ($data4 as $d4s)
        {
            $now_job=$d4s->job;

        }

        if($an_staff_job!=$now_job)//如果與另一個該時段的檢測人員負責項目不同則可新增值班時段
         {
        DB::table('per_week_schedules')->where('id',$id)->update(
            [

                'staff_id'=>$_SESSION['sid']


            ]
        );
             //        echo "<script>alert('已新增該時段排班')</script>"; 有bug 提醒視窗跳不出來
         }


        }//end_尋找同個時段的另一個人是誰，判斷負責項目是否相同
        else{//該時段沒有人

            DB::table('per_week_schedules')->where('id',$id)->update(
                [

                    'staff_id'=>$_SESSION['sid']


                ]
            );

}


        return redirect()->route('schedule.check',['staff' => $_SESSION['sid']]);

    }
    public function check($staff)
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
    public function next()
    {

        $month = date("n")+1;
        if($month>12){$month=$month-12;}


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

        return view('schedule_next',['staff' => $staff]);
        }




    public  function build()//產生下個月班表空間
    {
        $month = date("n")+1;
        $search = DB::table('per_week_schedules')->where('month',$month)->get();
        $count=0;
        foreach ($search as $searchs)
        {
            $count+=1;
        }
        if($count>1)//判斷下個月的班表是否建立
        {
            return redirect()->route('schedule.next');

        }

        for($k=1;$k<=2;$k++){
        for ($t=1;$t<=7;$t++){
            if ($t==1){ $we='一';}
            if ($t==2){ $we='二';}
            if ($t==3){ $we='三';}
            if ($t==4){ $we='四';}
            if ($t==5){ $we='五';}
            if ($t==6){ $we='六';}
            if ($t==7){ $we='日';}
        for($i=1;$i<=3;$i++)
        {
            if($i==1)
           {
              $st='09:00:00';
              $en='11:00:00';
            }
            if($i==2)
            {
                $st='15:00:00';
                $en='17:00:00';
            }
            if($i==3)
            {
                $st='18:00:00';
                $en='21:00:00';
            }
        DB::table('per_week_schedules')->insert(
            [

                'staff_id'=>null,

                'start'=>$st,
                'end'=>$en,
                'week'=>$we,
                'month'=>$month


            ]
        );
        }
        }
    }
        return redirect()->route('schedule.next');
    }
    public function addspace()
    {
        $en="";
        $st="";
        $month = date("n");
        if(isset($_GET['week'])&&$_GET['period'])
        {
            $we=$_GET['week'];
            $per=$_GET['period'];
        }

                    if($per=='早')
                    {
                        $st='09:00:00';
                        $en='11:00:00';
                    }
                    if($per=='午')
                    {
                        $st='15:00:00';
                        $en='17:00:00';
                    }
                    if($per=='晚')
                    {
                        $st='18:00:00';
                        $en='21:00:00';
                    }
                    DB::table('per_week_schedules')->insert(
                        [

                            'staff_id'=>null,

                            'start'=>$st,
                            'end'=>$en,
                            'week'=>$we,
                            'month'=>$month


                        ]
                    );
        return redirect()->route('schedule.index');

    }
    public  function t2()
{
//    $month = date("n")+1;
//    DB::table('per_week_schedules')->delete('month',$month);

    $t2 = PerWeekSchedule::where('month',4)->delete();

    $t2 = PerWeekSchedule::where('month',5)->delete();





}
    public function checknext($staff)
    {
        $month = date("n")+1;
        if($month>12){$month=$month-12;}
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

        return view('schedule_next_check');

    }
    public function addnext($id)
    {
        session_start();
        //start_尋找同個時段的另一個人是誰，判斷負責項目是否相同

        $data=DB::table('per_week_schedules')->where('id',$id)->get();

        foreach ($data as $ds)
        {
            $st=$ds->start;
            $we=$ds->week;
            $mo=$ds->month;
        }

        $data2=DB::table('per_week_schedules')->where('start',$st)->where('week',$we)->where('month',$mo)->get();

        foreach ($data2 as $d2s)
        {
            $an_staff=$d2s->staff_id;

        }
        if($an_staff!=null){//判斷該時段是否有人了
            $data3=DB::table('staff')->where('id',$an_staff)->get();
            $data4=DB::table('staff')->where('id',$_SESSION['sid'])->get();
            foreach ($data3 as $d3s)
            {
                $an_staff_job=$d3s->job;

            }
            foreach ($data4 as $d4s)
            {
                $now_job=$d4s->job;

            }

            if($an_staff_job!=$now_job)//如果與另一個該時段的檢測人員負責項目不同則可新增值班時段
            {
                DB::table('per_week_schedules')->where('id',$id)->update(
                    [

                        'staff_id'=>$_SESSION['sid']


                    ]
                );
                //        echo "<script>alert('已新增該時段排班')</script>"; 有bug 提醒視窗跳不出來
            }


        }//end_尋找同個時段的另一個人是誰，判斷負責項目是否相同
        else{//該時段沒有人

            DB::table('per_week_schedules')->where('id',$id)->update(
                [

                    'staff_id'=>$_SESSION['sid']


                ]
            );

        }

        return redirect()->route('schedule.checknext',['staff' => $_SESSION['sid']]);

    }
    public function removenext($id)
    {
        session_start();
        DB::table('per_week_schedules')->where('id',$id)->update(
            [



                'staff_id'=>null


            ]
        );
        // echo "<script>alert('已刪除該時段排班')</script>";  有bug 提醒視窗跳不出來
        return redirect()->route('schedule.checknext',['staff' => $_SESSION['sid']]);
    }
}
