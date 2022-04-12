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
    <div class="container-xxl position-relative bg-white d-flex p-0" >
        <div class="content" >
            <div class="col-md-10" style="margin-top:3%;margin-left:5%; float:left;">
                <div class="bg-light text-center rounded p-4">
                    @foreach($type as $types)
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-card-checklist"></i>&nbsp;<?php echo date('m/d'); ?>&nbsp;檢測項目:{{$types->name}}</a></h3><br>

                   </div>
                    @endforeach
                        @foreach($product as $products)
                            <div style="margin-left:5%;float: left;margin-bottom:3%;margin-top:5%">

                                <h4> <a style="color: gray">檢測商品名稱:{{$products->name}}</a><br><br>
                                    <a href="https://meet.google.com/jan-rghb-tsa" target="_blank" style="color:white" class="btn btn-sm btn-secondary">開啟會議室</a>
                                </h4>


                            </div>
                            <div style="margin-right:5%;float: right;margin-bottom:3%">
                                <img src="{{ asset('img/'.$products->pictures.'') }}" alt="" height="200">
                            </div>
                        @endforeach

                    <table class="table text-start align-middle table-bordered table-hover mb-0" style="border:whitesmoke">
                       <thead>
                             <tr class="text-dark" style="background-color:lightblue">

                             <th scope="col"style="color: #6b7280;text-align: center">問題</th>
                             <th scope="col"style="color: #6b7280;text-align: center">得分</th>
                             </tr>
                       </thead>
                        <tbody>
                        <div class="" style="background-color:lightblue;margin-top:5%">

                            @foreach($question as $questions)
                                @foreach($exam_data as $es)
                                  <tr>
                                      <td style="background-color:lightblue"><< <a style="color:gray;">{{$questions}}</a></td>
                                      <td>
                                          <form  method="GET"  action='{{route('exams.index',$es->id)}}'>
                                             <input class="container" type='number' name='qu[]' step='1' min='0' max='5'>

                                      </td>
                                  </tr>
                            @endforeach
                            @endforeach

                        </div>
                        </tbody>
                    </table>
                        <button class="btn btn-outline-dark" type="submit" style="background-color: lavender" >計算得分</button>
                        </form>
                    <?php
                        $score=0;
                        if(isset($_GET['qu']))
                        {

                         $b=$_GET['qu'];
                          for($i=0;$i<count($b);$i++)
                          {
                              $score+=$b[$i];
                              echo $b[$i]."<br>";
                          }

                       echo"總計". $score;
                        }


                        ?>
                </div>
            </div>
        </div>
    </div>


</main>


