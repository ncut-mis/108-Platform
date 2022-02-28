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
            <div class="col-md-12" style="margin-top:3%">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-card-checklist"></i>&nbsp;班表</a></h3>
                    </div>
                    <div class="table-responsive">

                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th scope="col"></th>
                                <th scope="col">一</th>
                                <th scope="col">二</th>
                                <th scope="col">三</th>
                                <th scope="col">四</th>
                                <th scope="col">五</th>
                                <th scope="col">六</th>
                                <th scope="col">日</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $w2=$_SESSION['w2'];
                            $w3=$_SESSION['w3'];
                            $w4=$_SESSION['w4'];
                            $w5=$_SESSION['w5'];
                            $w6=$_SESSION['w6'];
                            $w7=$_SESSION['w7'];

                            ?>


                                @foreach ($w1 as $w1s)
                                @foreach ($w2 as $w2s)
                                    @foreach ($w3 as $w3s)
                                        @foreach ($w4 as $w4s)
                                            @foreach ($w5 as $w5s)
                                                @foreach ($w6 as $w6s)
                                                    @foreach ($w7 as $w7s)

                                                            @if($w1s->start=='09:00:00'&&$w2s->start=='09:00:00'&&$w3s->start=='09:00:00'&&$w4s->start=='09:00:00'&&$w5s->start=='09:00:00'&&$w6s->start=='09:00:00'&&$w7s->start=='09:00:00')
                                        <tr>
                                            <td>早<br>9:00~11:00</td>
                                            @if($w1s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w1s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w1s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="{{route('staff.edit',$w1s->id)}}">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w2s->staff_id==null)
                                                <td><h4><a class="" href="{{route('staff.add',$w2s->id)}}">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w2s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w2s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w3s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w3s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w3s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w4s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w4s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w4s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w5s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w5s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w5s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w6s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w6s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w6s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($w7s->staff_id==null)
                                                <td><h4><a class="" href="">+</a></h4></td>
                                            @else
                                                @foreach($staff as$staffs)
                                                    @if($w7s->staff_id==$staffs->id)
                                                <td>人員編號:{{$w7s->staff_id}}<br>
                                                    人員姓名:{{$staffs->name}}<br>
                                                    <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endif

                                    @if($w1s->start=='15:00:00'&&$w2s->start=='15:00:00'&&$w3s->start=='15:00:00'&&$w4s->start=='15:00:00'&&$w5s->start=='15:00:00'&&$w6s->start=='15:00:00'&&$w7s->start=='15:00:00')

                                            <tr>
                                                <td>中<br>15:00~17:00</td>
                                                @if($w1s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w1s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w1s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w2s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w2s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w2s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w3s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w3s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w3s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w4s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w4s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w4s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w5s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w5s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w5s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w6s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w6s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w6s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($w7s->staff_id==null)
                                                    <td><h4><a class="" href="">+</a></h4></td>
                                                @else
                                                    @foreach($staff as$staffs)
                                                        @if($w7s->staff_id==$staffs->id)
                                                            <td>人員編號:{{$w7s->staff_id}}<br>
                                                                人員姓名:{{$staffs->name}}<br>
                                                                <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tr>
                                               @endif

                                    @if($w1s->start=='18:00:00'&&$w2s->start=='18:00:00'&&$w3s->start=='18:00:00'&&$w4s->start=='18:00:00'&&$w5s->start=='18:00:00'&&$w6s->start=='18:00:00'&&$w7s->start=='18:00:00')

                                             <tr>
                                                 <td>晚<br>18:00~21:00</td>
                                                 @if($w1s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w1s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w1s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w2s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w2s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w2s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w3s->staff_id==null)
                                                     <td><h4><a class="" href="{{route('staff.add',$w3s->id)}}">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w3s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w3s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w4s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w4s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w4s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w5s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w5s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w5s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w6s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w6s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w6s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                                 @if($w7s->staff_id==null)
                                                     <td><h4><a class="" href="">+</a></h4></td>
                                                 @else
                                                     @foreach($staff as$staffs)
                                                         @if($w7s->staff_id==$staffs->id)
                                                             <td>人員編號:{{$w7s->staff_id}}<br>
                                                                 人員姓名:{{$staffs->name}}<br>
                                                                 <a class="btn btn-sm btn-danger" href="">x</a>&nbsp;<a class="btn btn-sm btn-primary" href="">!</a></td>
                                                         @endif
                                                     @endforeach
                                                 @endif
                                             </tr>

                                                        @endif
                                                    @endforeach
                                               @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                               @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
