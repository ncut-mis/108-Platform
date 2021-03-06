@extends('layouts.master')

@section('title','平台管理者頁面')
<header>
    <nav class="navbar navbar-expand-md navbar-dark"  style="background-color: lightblue">
        <div class="container-fluid" style="margin-left:70%">
            <div class="collapse navbar-collapse navbar-right " id="navbarCollapse">
                <ul class="nav nav-pills nav-fill"><br>
                    <li class="nav-item">
                        <div class="navbar-nav align-items-center  ms-auto">
                            <div class="nav-item dropdown">
{{--                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--                                    <i class="fa fa-envelope me-lg-2"></i>--}}
{{--                                    <span class="d-none d-lg-inline-flex">Message</span> &nbsp;--}}
{{--                                </a>--}}
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
{{--                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--                                <i class="fa fa-bell me-lg-2"></i>--}}
{{--                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;--}}
{{--                            </a>--}}
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
                    <?php //if(\Illuminate\Support\Facades\Auth::check()){ $un=auth()->user()->name; echo "歡迎使用者:&nbsp;".$un;}else{}?>

                    <li>
{{--                    <a href="#" class="sidebar-toggler flex-shrink-0" style="margin:auto">--}}
{{--                        &nbsp;<i class="bi bi-arrow-up-right-square-fill"></i>--}}
{{--                    </a>--}}
                    </li>


                </ul>
            </div>

        </div>
    </nav>

</header>

<main>
<div class="container-xxl position-relative bg-white d-flex p-0">
<div class="content">
<div class="col-md-8" style="float: left;margin:2%">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <table class="table text-start align-middle table-hover mb-0" frame="void">
                <thead>
                @if(isset($posts))
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; 公告區</a></h3>
                    </div>
                    <thead>
                    <tr>
                        <th>日期</th>
                        <th>標題</th>
                        <th>公告對象</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($posts as $p)
                        <tr>
                            <td><div>{{$p->date}}</div></td>
                            <td><div style="font-size: 18px;">{{$p->title}}</div></td>
                            @if($p->for == '0')
                                <td><div style="font-size: 18px;">賣家</div></td>
                            @else
                                <td><div style="font-size: 18px;">檢測人員</div></td>
                            @endif
                            <td><div>
                                    <form action="{{route('adminhome.show_post',$p->id)}}">
                                        <input type="hidden" name="id" value="{{$p->id}}">
                                        <button style="text-align:center; vertical-align:center; color: black; font-size: 18px;" class="btn btn-sm btn-link">詳細內容</button>
                                    </form>
                            </div></td>
                        </tr>
                    @endforeach
                @endif
                    @if(isset($post1))
                        <div style="vertical-align: center; text-align: right">
                            <a class="btn btn-sm btn-danger" href="{{route('adminhome.index')}}">返回</a>
                        </div>
                        <table>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; {{$post1->title}}</a></h3>
                            </div>
                            <tr><td><div>
                                 <p style="white-space: pre-line; font-size: 20px;">{{$post1->content}}</p>
                                 @if($post1->id == 4)
                                     <?php
                                        $check = \App\Models\Category::where('categories.status','=','1')->get();?>
                                     @foreach($check as $cc)
                                             <tr><td><div>
                                                 <form action="{{route('adminhome.show_item',$cc->id)}}">
                                                     <input type="hidden" name="category_id" value="{{$cc->id}}">
                                                     <button style="text-align:center; vertical-align:center; color: black; font-size: 18px;" class="btn btn-sm btn-link">{{$cc->name}}</button>
                                                 </form>
                                             </div></td></tr>
                                     @endforeach
                                     @if(isset($quality))
                                             <tr>
                                                 <th>Quality_item</th>
                                                 <th>Extra_item</th>
                                             </tr>
                                          @foreach($quality as $qq)
                                             <div style="font-size: 16px;">
                                                 <tr>
                                                     <td>
                                                        {{$qq->content}}
                                                     </td>
                                                     @if($qq->extra == 1)
                                                         <td style="text-align: center">是</td>
                                                     @else
                                                         <td style="text-align: center">  </td>
                                                     @endif
                                                 </tr>
                                             </div>
                                          @endforeach
                                     @endif
                                 @endif
                        </div></td></tr>
                    </table>
                    @endif
                </tbody>
        </table>
        </div>
    </div>
</div>
<br><br>

    <?php

            $apply_status=$_SESSION['apply_status'];
            $schedule_status=$_SESSION['schedule_status'];

            $i=0;
                foreach ($apply_status as $ss)
                {
                    $i+=1;

                }
                if($i>0)
                {
                    echo
                    "<div class='col-md-3' style='float: right ;margin-right:3%'> <div class='alert alert-danger alert-dismissable'>
                     <a type='button' class='close' style='color: #6b7280;font-size:25px'data-dismiss='alert' aria-hidden='true'>&times;</a>
                     &nbsp; <i class='fa fa-info-circle'></i>  <strong>提醒 ! </strong>有賣家申請尚未處理!
                     </div>";

                }
            $j=0;
                foreach ($schedule_status as $sss)
                {
                    $j+=1;

                }
                if($j>0)
                {
                    echo
                    "<div class='' style=''> <div class='alert alert-danger alert-dismissable'>
                           <a type='button' class='close' style='color: #6b7280;font-size:25px'data-dismiss='alert' aria-hidden='true'>&times;</a>
                          &nbsp; <i class='fa fa-info-circle'></i>  <strong>提醒 ! </strong>本月仍有空白值班時段!
                           </div>";

                }

        ?>
</div>
</div>

</main>
