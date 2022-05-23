@extends('layouts.second')
<header>
    <nav class="navbar navbar-expand-md navbar-dark"  style="background-color: lightblue">
        <div class="container-fluid" style="margin-left:70%">
            <div class="collapse navbar-collapse navbar-right " id="navbarCollapse">
                <ul class="nav nav-pills nav-fill"><br>
                    <li class="nav-item">
                        <div class="navbar-nav align-items-center  ms-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-envelope me-lg-2"></i>
                                    <span class="d-none d-lg-inline-flex">Message</span> &nbsp;
                                </a>
{{--                                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">--}}
{{--                                    <a href="#" class="dropdown-item">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">--}}
{{--                                            <div class="ms-2">--}}
{{--                                                <h6 class="fw-normal mb-0">收到XXX訊息</h6>--}}
{{--                                                <small>15 minutes ago</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <hr class="dropdown-divider">--}}
{{--                                    <a href="#" class="dropdown-item text-center">See all message</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;
                            </a>
{{--                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">--}}
{{--                                <a href="#" class="dropdown-item">--}}
{{--                                    <h6 class="fw-normal mb-0">提醒XXX</h6>--}}
{{--                                    <small>15 minutes ago</small>--}}
{{--                                </a>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                                <a href="#" class="dropdown-item">--}}
{{--                                    <h6 class="fw-normal mb-0">提醒XXX</h6>--}}
{{--                                    <small>15 minutes ago</small>--}}
{{--                                </a>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                                <a href="#" class="dropdown-item text-center">See all notifications</a>--}}
{{--                            </div>--}}
                        </div>
                    </li>

                    <a href="#" class="sidebar-toggler flex-shrink-0" style="margin:auto">
                        &nbsp;<i class="bi bi-arrow-up-right-square-fill"></i>
                    </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

</header>
<main>
    <div class="container-xxl position-relative bg-white d-flex p-0" >
        <div class="content" >
            <div class="col-md-10" style="margin-top:3%;margin-left:5%; float:left;">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-card-checklist"></i>&nbsp;<?php echo date('m/d'); ?>&nbsp;所有品質檢測時段</a></h3>

                    </div>
                    <table class="table text-start align-middle table-bordered table-hover mb-0" style="border:whitesmoke">
                        <div class="container" style="font-size:25px ;float: left;align-content: center;">
                            <?php
                            date_default_timezone_set('Asia/Taipei');//時區調整
                            $start='9:00:00';
                            $_SESSION['tt']=0;
                            $count=0;
                            $now=date("H:i:s");

                            //通知施工區_start_測試版
//                            $start_t="19:46:00";
//
//                                  if(strtotime($now)<strtotime($start_t))
//                                   {
//                                       $t2=strtotime($start_t)-strtotime($now);
//                                       echo $t2;
//                                       if($t2<300){
//                                       echo "<script> if(confirm( '離下個檢測時間開始不到5分鐘，請注意時間')) ; </script>";
//
//                                   }
//                                   }
                            //通知施工區_end
                            $list[]='';
                            for($i=1;$i<=96;$i++)//1個小時有4個15分鐘，所以24小時有96個
                            {
                                $temp=date("H:i:s", strtotime($start."+15 minute"));


//                                foreach ($_SESSION['exam_finish'] as $finish)//判斷檢測是否完成(bug)
//                                {


                                        foreach ($_SESSION['exam'] as $datas) {


                                                if($start==$datas->start&&strtotime($now)<strtotime($start))//判斷資料庫是否有這筆資料且當前時間不超過檢測時間
                                                {


                                                    $count++;
                                                    $_SESSION['tt']=1;
                                                    break;
                                                }

                                                else
                                                {
                                                    $_SESSION['tt']=0;
                                                }


                                            }
//                                        }




                                 if ($_SESSION['tt']==1)
                                {

                                    echo"<div class='' style='margin-bottom:3%;margin-top:5%;'>";
                                    echo $start."~".$temp;
                                    echo "&nbsp";
                                    echo"&nbsp;<a href='/staff/exams/{$datas->id}' class='btn btn-sm btn-secondary'>進行檢測</a><br><br><hr>";
                                    echo"</div>";

                                    $list[]=$start;

                                }


                                $start=$temp;
                            }
//
                            //簡易通知_start
                            if(\PHPUnit\Framework\isEmpty($list)){ }
                            else{
                            if(strtotime($now)<strtotime($list[1]))
                            {
                                $t2=strtotime($list[1])-strtotime($now);
                                if($t2<300&&$t2>=240)
                                {
                                    echo "<script> if(confirm( '離下個檢測時間開始剩下5分鐘，請注意時間')) ; </script>";

                                }
                             else   if($t2<240&&$t2>=180)
                                {
                                    echo "<script> if(confirm( '離下個檢測時間開始剩下4分鐘，請注意時間')) ; </script>";

                                }
                             else   if($t2<180&&$t2>=120)
                             {
                                 echo "<script> if(confirm( '離下個檢測時間開始剩下3分鐘，請注意時間')) ; </script>";

                             }
                             else   if($t2<120&&$t2>=60)
                             {
                                 echo "<script> if(confirm( '離下個檢測時間開始剩下2分鐘，請注意時間')) ; </script>";

                             }
                             else   if($t2<60&&$t2>=0)
                             {
                                 echo "<script> if(confirm( '離下個檢測時間開始剩下1分鐘，請注意時間')) ; </script>";

                             }
                            }
                            }//簡易通知_end

//

                            if($count==0) echo "<strong><a>今日已無檢測</a></strong>";
//                            $count=0;
//                             foreach ($_SESSION['exam'] as $datas)
//                                 {
//                                     $count++;
//                                     if($count>0)
//                                     {
//                                         echo $datas->start."~".$datas->end;
//                                         echo "&nbsp<hr>";
//                                         echo"<a href='' class='btn btn-sm btn-secondary'>進行檢測</a><br><br>";
//                                     }
//
//
//
//                                 }
//                                      if($count==0) echo "<strong><a>今日已無檢測</a></strong>";



                            ?>


                        </div>

                    </table>
                </div>
            </div>
        </div>
    </div>


</main>


