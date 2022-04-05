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
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-card-checklist"></i>&nbsp;詳細時段</a></h3>

                    </div>
                    <table class="table text-start align-middle table-bordered table-hover mb-0" style="border:whitesmoke">
                    <div class="" style="font-size:25px ;float: left;align-content: center;">
                        <?php
                        date_default_timezone_set('Asia/Taipei');//時區調整
                        $start= $_SESSION['start'];
                        $detail=$_SESSION['staff_detail'];
                        $_SESSION['tt']=0;

                   for($i=1;$i<=6;$i++)
                        {
                            $temp=date("H:i:s", strtotime($start."+15 minute"));

                                foreach ($detail as $details)
                                {
                                    $d=explode("-",$details->date);
                                    $f=date("w",mktime(0,0,0,$d[1],$d[2],$d[0]));
                                    if($f==0)
                                        $wk='日';
                                    else if ($f==1)
                                        $wk='一';
                                    else if ($f==2)
                                        $wk='二';
                                    else if ($f==3)
                                        $wk='三';
                                    else if ($f==4)
                                        $wk='四';
                                    else if ($f==5)
                                        $wk='五';
                                    else if ($f==6)
                                        $wk='六';
                                    if($_SESSION['week']==$wk)//日期星期的判斷
                                        {
                                            if($start==$details->start)//判斷資料庫是否有這筆資料
                                            {
                                                $_SESSION['tt']=1;
                                                break;
                                            }
                                            else
                                            {
                                                $_SESSION['tt']=0;
                                            }
                                        }

                                }

                                if($_SESSION['tt']==0)
                                {
                                    echo" <input type='checkbox' name='' value='' >";
                                    echo "&nbsp";
                                    echo $start."~".$temp;
                                    echo "&nbsp<hr><br><br>";
                                }
                                else if ($_SESSION['tt']==1)
                                {
                                    echo" <input type='checkbox' name='' value='' checked>";
                                    echo "&nbsp";
                                    echo $start."~".$temp;
                                    echo "&nbsp<hr>";
                                    echo"<a href='' class='btn btn-sm btn-secondary'>前往會議室</a><br><br>";

                                }


                                     $start=$temp;
                            }



                        ?>
                    </div>
                      <div class="" style="font-size:25px;float: left;margin-left: 25%;align-content: center;">
                          <?php
                          date_default_timezone_set('Asia/Taipei');//時區調整

                          for($i=7;$i<=12;$i++)
                          {
                              $temp=date("H:i:s", strtotime($start."+15 minute"));

                              foreach ($detail as $details)
                              {
                                  $d=explode("-",$details->date);
                                  $f=date("w",mktime(0,0,0,$d[1],$d[2],$d[0]));
                                  if($f==0)
                                      $wk='日';
                                  else if ($f==1)
                                      $wk='一';
                                  else if ($f==2)
                                      $wk='二';
                                  else if ($f==3)
                                      $wk='三';
                                  else if ($f==4)
                                      $wk='四';
                                  else if ($f==5)
                                      $wk='五';
                                  else if ($f==6)
                                      $wk='六';
                                  if($_SESSION['week']==$wk)//日期星期的判斷
                                      {
                                          if($start==$details->start)//之後改成判斷資料庫是否有這筆資料
                                          {
                                              $_SESSION['tt']=1;
                                              break;
                                          }
                                          else
                                          {
                                              $_SESSION['tt']=0;
                                          }
                                      }

                              }
                              if($_SESSION['tt']==0)
                              {
                                  echo" <input type='checkbox' name='' value='' >";
                                  echo "&nbsp";
                                  echo $start."~".$temp;
                                  echo "&nbsp<hr><br><br>";
                              }
                              else if ($_SESSION['tt']==1)
                              {
                                  echo" <input type='checkbox' name='' value='' checked>";
                                  echo "&nbsp";
                                  echo $start."~".$temp;
                                  echo "&nbsp<hr>";
                                  echo"<a href='' class='btn btn-sm btn-secondary'>前往會議室</a><br><br>";

                              }


                              $start=$temp;
                          }




                          ?>
                    </div>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>


