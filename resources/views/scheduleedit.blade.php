@extends('layouts.master')
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top"  style="background-color: lightblue">
        <div class="container-fluid" >
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
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        &nbsp;<i class="bi bi-arrow-up-right-square-fill"></i>
                    </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

</header>
<main>
    @foreach($add as $adds)

                    <div class="container">
                        <div class="col-md-12">
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <a><h2><i class=""></i>&nbsp;新增</h2></a>
                                </div>
                                <h3>人員編號:&nbsp;<input type="text" name="staffid"></h3><br>
                                <h3> 人員姓名:&nbsp;<input type="text" name="staffname"></h3><br>
                                <h3> 開始時間:<a>{{$adds->start}}</a></h3><br>
                                <h3> 結束時間:<a>{{$adds->end}}</a></h3><br>
                        <h3>星期<a>{{$adds->week}}</a></h3><br>
                    </div>
                    </div>
                    </div>
        </div>




    @endforeach
</main>


