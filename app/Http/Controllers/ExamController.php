<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Product;
use App\Models\QualityItem;
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
        $_SESSION['cid']= $c_id;
        $type=Category::where('id',$c_id)->get();//檢測的類別
        $_SESSION['link']='';
        $_SESSION['exam_paas']='';
        foreach ($type as $types)
        {
            $question=QualityItem::where('category_id',$types->id)->where('extra',0)->get();//一般檢測項目
            $extra_question=QualityItem::where('category_id',$types->id)->where('extra',1)->get();//額外檢測項目
            if($types->name=='名牌服飾')
            {
                $_SESSION['link']='https://meet.google.com/qvh-hqum-dvc';
                $_SESSION['exam_type']='名牌服飾';
            }
            else  if($types->name=='書籍'){
                $_SESSION['link']='https://meet.google.com/hof-hvzr-ykt';
                $_SESSION['exam_type']='書籍';
            }
            else  if($types->name=='鋼筆'){
                $_SESSION['link']='https://meet.google.com/kbn-dqif-mku';
                $_SESSION['exam_type']='鋼筆';

            }
            else  if($types->name=='專輯'){
                $_SESSION['link']='https://meet.google.com/zmy-tzzm-bxs';
                $_SESSION['exam_type']='專輯';

            }
        }
            return view('exam',compact('exam_data','product','type','question','extra_question'));
    }

    public function finish()
    {
        session_start();
        $id=$_SESSION['exam_id'];
        if($_SESSION['exam_paas']=="通過")
        {
            DB::table('exams')->where('id', $id)->update(
                [



                    'pass'=>'1',
                    'url'=>'1'


                ]
            );
        }
      else  if($_SESSION['exam_paas']=="優良")
        {
            DB::table('exams')->where('id', $id)->update(
                [



                    'pass'=>'1',
                    'perfect'=>'1',
                    'url'=>'1'


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
      DB:Category::where('name', $_SESSION['exam_type'])->get();

        DB::table('exam_item_scores')->insert(
            [


                'exam_id'=>$id,
                'quality_item_id'=>$_SESSION['cid'],
                'score'=>$_SESSION['total']



            ]
        );
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
