@extends('layouts.master')
<header xmlns="http://www.w3.org/1999/html">
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
    @foreach($edit as $edits)
        @foreach($staff as $staffs)
            @if($edits->staff_id==$staffs->id)
        <div class="container-xxl position-relative bg-white d-flex p-0">
            <div class="container">
                <div class="col-md-6" style="margin-left:35%;margin-top:3%;margin-bottom:3%">
                    <div class="bg-light rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp;修改</a></h3>
                        </div>
                        <form action="" name="form" method="GET">
                            <h4 style="color: #6b7280">人員編號:&nbsp;<input type="text" name="staffid" placeholder="{{$edits->staff_id}}"></h4><br>
                            <h4 style="color: #6b7280"> 人員姓名:&nbsp;<input type="text" name="staffname" placeholder="{{$staffs->name}}"></h4><br>
                            <h4 style="color: #6b7280">開始時間:&nbsp;<a>{{$edits->start}}</a></h4><br>
                            <h4 style="color: #6b7280">結束時間:&nbsp;<a>{{$edits->end}}</a></h4><br>
                            <h4 style="color: #6b7280">星期<a>{{$edits->week}}</a></h4><br>
                            <center><input type='submit' class="btn-info" style="color:white" name='OK' value='送出'></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            @endif
        @endforeach
    @endforeach
</main>


