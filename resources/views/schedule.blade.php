@extends('layouts.master')
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
                                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                    <a href="#" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                            <div class="ms-2">
                                                <h6 class="fw-normal mb-0">收到XXX訊息</h6>
                                                <small>15 minutes ago</small>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item text-center">See all message</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">提醒XXX</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">提醒XXX</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all notifications</a>
                            </div>
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
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="content">
            <div class="col-md-8" style="margin-top:3%;float:left;">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-card-checklist"></i>&nbsp;班表</a></h3>
                        <h3><a class=""><?php
                                $month = date("n");
                                echo "適用月份:".$month."月"; //抓系統當前月份
                                ?></a></h3>
                    </div>
                    <div class="table-responsive">

                        <table class="table text-start align-middle table-bordered table-hover mb-0" style="border:whitesmoke">
                            <thead>
                            <tr class="text-dark" style="background-color:lightblue">
                                <th scope="col"></th>
                                <th scope="col"style="color: #6b7280;text-align: center">一</th>
                                <th scope="col"style="color: #6b7280;text-align: center">二</th>
                                <th scope="col"style="color: #6b7280;text-align: center">三</th>
                                <th scope="col"style="color: #6b7280;text-align: center">四</th>
                                <th scope="col"style="color: #6b7280;text-align: center">五</th>
                                <th scope="col"style="color: #6b7280;text-align: center">六</th>
                                <th scope="col"style="color: #6b7280;text-align: center">日</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $w1_1=$_SESSION['w1_1'];
                            $w1_2=$_SESSION['w1_2'];
                            $w1_3=$_SESSION['w1_3'];

                            $w2_1=$_SESSION['w2_1'];
                            $w2_2=$_SESSION['w2_2'];
                            $w2_3=$_SESSION['w2_3'];

                            $w3_1=$_SESSION['w3_1'];
                            $w3_2=$_SESSION['w3_2'];
                            $w3_3=$_SESSION['w3_3'];

                            $w4_1=$_SESSION['w4_1'];
                            $w4_2=$_SESSION['w4_2'];
                            $w4_3=$_SESSION['w4_3'];

                            $w5_1=$_SESSION['w5_1'];
                            $w5_2=$_SESSION['w5_2'];
                            $w5_3=$_SESSION['w5_3'];

                            $w6_1=$_SESSION['w6_1'];
                            $w6_2=$_SESSION['w6_2'];
                            $w6_3=$_SESSION['w6_3'];

                            $w7_1=$_SESSION['w7_1'];
                            $w7_2=$_SESSION['w7_2'];
                            $w7_3=$_SESSION['w7_3'];

                            $staff=$_SESSION['staff'];
                            ?>
                                        <tr><!--早上 -->
                                            <td style="background-color:lightblue;text-align: center">早<br>9:00~11:00</td>
                                                <td style="text-align: center">
                                                <?php

                                                    foreach ($w1_1 as $w1_1s)
                                                    {

                                                        foreach ($staff as $staffs)
                                                            if($w1_1s->staff_id==$staffs->id)
                                                      {
                                                    if ($w1_1s->staff_id==null)
                                                        echo "";
                                                    else
                                                       echo "編號:".$w1_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                      }

                                                    }


                                                   ?>

                                                </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w2_1 as $w2_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w2_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w2_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號:".$w2_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }

                                                ?>

                                            </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w3_1 as $w3_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w3_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w3_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號:".$w3_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }


                                                ?>

                                            </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w4_1 as $w4_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w4_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w4_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號:".$w4_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }


                                                ?>

                                            </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w5_1 as $w5_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w5_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w5_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號:".$w5_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }


                                                ?>

                                            </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w6_1 as $w6_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w6_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w6_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號".$w6_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }


                                                ?>

                                            </td>
                                            <td style="text-align: center">
                                                <?php

                                                foreach ($w7_1 as $w7_1s)
                                                {

                                                    foreach ($staff as $staffs)
                                                        if($w7_1s->staff_id==$staffs->id)
                                                        {
                                                            if ($w7_1s->staff_id==null)
                                                                echo "";
                                                            else
                                                                echo "編號".$w7_1s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                                        }

                                                }


                                                ?>

                                            </td>
                                        </tr>
                            <tr><!--午-->
                                <td style="background-color:lightblue;text-align: center">午<br>15:00~17:00</td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w1_2 as $w1_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w1_2s->staff_id==$staffs->id)
                                            {
                                                if ($w1_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w1_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }

                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w2_2 as $w2_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w2_2s->staff_id==$staffs->id)
                                            {
                                                if ($w2_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w2_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }

                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w3_2 as $w3_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w3_2s->staff_id==$staffs->id)
                                            {
                                                if ($w3_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w3_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w4_2 as $w4_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w4_2s->staff_id==$staffs->id)
                                            {
                                                if ($w4_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w4_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w5_2 as $w5_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w5_2s->staff_id==$staffs->id)
                                            {
                                                if ($w5_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w5_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w6_2 as $w6_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w6_2s->staff_id==$staffs->id)
                                            {
                                                if ($w6_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w6_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w7_2 as $w7_2s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w7_2s->staff_id==$staffs->id)
                                            {
                                                if ($w7_2s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w7_2s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                            </tr>
                            <tr><!--晚-->
                                <td style="background-color:lightblue;text-align: center">晚<br>18:00~21:00</td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w1_3 as $w1_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w1_3s->staff_id==$staffs->id)
                                            {
                                                if ($w1_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w1_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w2_3 as $w2_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w2_3s->staff_id==$staffs->id)
                                            {
                                                if ($w2_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w2_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }

                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w3_3 as $w3_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w3_3s->staff_id==$staffs->id)
                                            {
                                                if ($w3_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w3_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w4_3 as $w4_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w4_3s->staff_id==$staffs->id)
                                            {
                                                if ($w4_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w4_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w5_3 as $w5_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w5_3s->staff_id==$staffs->id)
                                            {
                                                if ($w5_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w5_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w6_3 as $w6_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w6_3s->staff_id==$staffs->id)
                                            {
                                                if ($w6_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w6_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                                <td style="text-align: center">
                                    <?php

                                    foreach ($w7_3 as $w7_3s)
                                    {

                                        foreach ($staff as $staffs)
                                            if($w7_3s->staff_id==$staffs->id)
                                            {
                                                if ($w7_3s->staff_id==null)
                                                    echo "";
                                                else
                                                    echo "編號:".$w7_3s->staff_id."<br>姓名:".$staffs->name."<br><hr>";

                                            }

                                    }


                                    ?>

                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
                <br><center>
                    <a class="btn btn-sm btn-secondary" style="" href="{{route('schedule.test2')}}">t2</a>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="collapse" data-bs-target="#demo">新增排班空間</button>
                    <a class="btn btn-sm btn-secondary" style="" href="{{route('schedule.index')}}">本月班表</a>
                    <a class="btn btn-sm btn-secondary" style="" href="{{route('schedule.build')}}">下個月班表</a>
                </center>
                <br>
                <div id="demo" class="collapse" style="margin-left: 5%">
                    <h4> <a class="a1"><i class="bi bi-pen"></i>&nbsp;選擇星期和時段</a></h4>
                        <form action="{{route('schedule.addspace')}}" method="GET">
                            星期:
                            <select name="week" style="color:gray;font-weight:bold">
                                <option value="一"> 一 </option>
                                <option value="二"> 二 </option>
                                <option value="三"> 三 </option>
                                <option value="四"> 四 </option>
                                <option value="五"> 五 </option>
                                <option value="六"> 六 </option>
                                <option value="日"> 日 </option>
                            </select>
                            時段:
                            <select name="period" style="color:gray;font-weight:bold">
                                <option value="早"> 早 </option>
                                <option value="午"> 午 </option>
                                <option value="晚"> 晚 </option>

                            </select>

                            <input type="submit" class="btn btn-sm btn-secondary" value="新增">
                        </form>

                </div>
            </div>

            <div class="col-md-3" style="float: right ;margin-right:3%;margin-top:3%;">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3> <a class="a1"><i class="bi bi-pen"></i>&nbsp;人員選擇</a></h3>
                    </div>
                  @foreach($staff as $staffs)
                  @if($staffs->job!='管理員')
                        <a class="" style="" href="{{route('schedule.check',$staffs->id)}}">
                            編號:{{$staffs->id}}
                            <br>
                            姓名:{{$staffs->name}}
                            <br>
                            負責項目:{{$staffs->job}}
                            <br>
                            <hr>
                        </a>
                        @endif
                    @endforeach



            </div>

        </div>
    </div>

</main>
