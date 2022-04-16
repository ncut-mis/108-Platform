<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        session_start();
        $_SESSION['exam_id']=$id;
        $exam_data = Exam::where('id', $id)->get();//取得檢測資料
        foreach ($exam_data as $ds)
        {
            $p_id=$ds->product_id;

        }

         $product=Product::where('id',$p_id)->get();//檢測的商品
        foreach ($product as $ps)
        {
            $c_id=$ps->category_id;
        }
        $type=Category::where('id',$c_id)->get();//檢測的類別
        $_SESSION['link']='';
        $_SESSION['exam_paas']='';
        foreach ($type as $types)
        {
            if($types->name=='名牌服飾'){
                $question=array("是否有明顯污漬(正反)","是否有脫線狀況(正反)","容易摩擦處是否有毛球or破損(正反)","扣子/拉鍊是否有缺少或無法正常使用","是否為*特殊材質","是否未持有該商品的保證卡或發票(是為1分，否為5分)");
                $_SESSION['link']='https://meet.google.com/qvh-hqum-dvc';
                $_SESSION['exam_type']='名牌服飾';
            }
          else  if($types->name=='書籍'){
              $question=array("書本是否有污漬","書本內容是否有缺頁、掉頁","書本是否有摺痕","書本內容是否有劃線、註記","書本是否有黃斑(書口、內頁被陽光曬到褪色)","書本是否泡過水");
              $_SESSION['link']='https://meet.google.com/hof-hvzr-ykt';
              $_SESSION['exam_type']='書籍';
          }
          else  if($types->name=='鋼筆'){
              $question=array("外觀是否有刮痕、凹陷…(以明顯程度評分)","筆尖是否有刮痕或維修過的痕跡","筆舌內是否有乾枯的墨水堆積、斷裂、變形");
              $_SESSION['link']='https://meet.google.com/kbn-dqif-mku';
              $_SESSION['exam_type']='鋼筆';

          }
          else  if($types->name=='專輯'){
              $question=array("能否正常播放","專輯外盒/封面是否有損壞(或污漬)","CD片是否有刮痕","寫真書內頁是否有缺頁","專輯是否有附成員明信片","成員明信片是否有缺少","專輯是否有附專輯小卡","專輯小卡是否有缺少","專輯是否有附海報","海報是否有污漬");
              $_SESSION['link']='https://meet.google.com/zmy-tzzm-bxs';
              $_SESSION['exam_type']='專輯';

          }
        }



            return view('exam',compact('exam_data','product','type','question'));
    }

    public function finish()
    {
        session_start();
        $id=$_SESSION['exam_id'];
        if($_SESSION['exam_paas']=="通過")
        {
            DB::table('exams')->where('id', $id)->update(
                [



                    'pass'=>'1'


                ]
            );
        }
      else  if($_SESSION['exam_paas']=="優良")
        {
            DB::table('exams')->where('id', $id)->update(
                [



                    'pass'=>'1',
                    'perfect'=>'1'


                ]
            );
        }
      else
      {
          DB::table('exams')->where('id',$id)->update(
              [



                  'pass'=>'0',
                  'perfect'=>'0'


              ]
          );
      }
        return redirect()->route('staffhome.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
