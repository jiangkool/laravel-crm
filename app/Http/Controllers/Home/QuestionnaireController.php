<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dclog;
use App\Models\Comment;

class QuestionnaireController extends Controller
{
    public function index()
    {
    	//show questionnaire
    	return view('home.qa');
    	
    }

    public function store(Request $request)
    {
    	//validate data
    	$validation=$this->validate($request,[
    			'paylist1'=>'required|min:1|max:5',
    			'paylist2'=>'required|min:1|max:5',
    			'paylist3'=>'required|min:1|max:5',
    			'paylist4'=>'required|min:1|max:5',
    			'paylist5'=>'required|min:1|max:5',
    			'paylist6'=>'required|min:1|max:5',
    			'paylist7'=>'required|min:1|max:5',
    			'paylist8'=>'required|min:1|max:5',
    			'paylist9'=>'required|min:1|max:5',
    			'paylist10'=>'required|min:1|max:5',
    			'paylist11'=>'required|min:1|max:5',
    			'paylist12'=>'required|min:1|max:5',
    			'paylist13'=>'required|min:1|max:5',
    			'paylist14'=>'required|min:1|max:5',
    			'paylist15'=>'required|min:1|max:5',
    			'paylist16'=>'required|min:1|max:5',
    			'paylist17'=>'required|min:1|max:5',
    			'paylist18'=>'required|min:1|max:5',
    			'paylist19'=>'required|min:1|max:5',
    			'paylist20'=>'required|min:1|max:5'	
    		]);

    	if ($validation==null) {

    		//get score arr
    		$tmarr=$request->all();
    		array_pop($tmarr) && array_shift($tmarr);
    		$tmarr=array_values($tmarr);

    		//get total score
    		$toatlScore=array_sum($tmarr);

    		//get ispleased val
    		$ispleased=$toatlScore<60 ? 0:1; 

    		//create data
    		if (Dclog::create(['t1_score'=>$request->paylist1,'t2_score'=>$request->paylist2,'t3_score'=>$request->paylist3,'t4_score'=>$request->paylist4,'t5_score'=>$request->paylist5,'t6_score'=>$request->paylist6,'t7_score'=>$request->paylist7,'t8_score'=>$request->paylist8,'t9_score'=>$request->paylist9,'t10_score'=>$request->paylist10,'t11_score'=>$request->paylist11,'t12_score'=>$request->paylist12,'t13_score'=>$request->paylist13,'t14_score'=>$request->paylist14,'t15_score'=>$request->paylist15,'t16_score'=>$request->paylist16,'t17_score'=>$request->paylist17,'t18_score'=>$request->paylist18,'t19_score'=>$request->paylist19,'t20_score'=>$request->paylist20,'total_score'=>$toatlScore,'ispleased'=>$ispleased])) {

    			if ($request->comment && Comment::create(['comment_content'=>$request->comment])) {

    				return redirect()->back()->with('message','提交成功！感谢您的答卷！');

    			}elseif($request->comment==null){

    				return redirect()->back()->with('message','提交成功！感谢您的答卷！');
    			}
    			
    		}
    		
    		
    	}else{

    		return redirect()->back()->with('message','出错了！请确定已完成所有题目！')->withInput();
    	}	
    	
    }


    //show questionnaire result
    public function result()
    {
    	$dclog_model=Dclog::query();

    	//get last month data
    	$dclog_model->whereMonth('created_at','=',date('m'));

    	$data=$dclog_model->get();

    	//has $data
    	if ($data) {
    		
    		//get people num
    		$ppnum=$data->count();

    		//get every question score
    		$total_score['t1']=$data->pluck('t1_score')->sum();
    		$total_score['t2']=$data->pluck('t2_score')->sum();
    		$total_score['t3']=$data->pluck('t3_score')->sum();
    		$total_score['t4']=$data->pluck('t4_score')->sum();
    		$total_score['t5']=$data->pluck('t5_score')->sum();
    		$total_score['t6']=$data->pluck('t6_score')->sum();
    		$total_score['t7']=$data->pluck('t7_score')->sum();
    		$total_score['t8']=$data->pluck('t8_score')->sum();
    		$total_score['t9']=$data->pluck('t9_score')->sum();
   			$total_score['t10']=$data->pluck('t10_score')->sum();
    		$total_score['t11']=$data->pluck('t11_score')->sum();
    		$total_score['t12']=$data->pluck('t12_score')->sum();
    		$total_score['t13']=$data->pluck('t13_score')->sum();
    		$total_score['t14']=$data->pluck('t14_score')->sum();
    		$total_score['t15']=$data->pluck('t15_score')->sum();
    		$total_score['t16']=$data->pluck('t16_score')->sum();
    		$total_score['t17']=$data->pluck('t17_score')->sum();
    		$total_score['t18']=$data->pluck('t18_score')->sum();
    		$total_score['t19']=$data->pluck('t19_score')->sum();
    		$total_score['t20']=$data->pluck('t20_score')->sum();

    		//get avg score
    		$total_score['avg1']=$data->pluck('t1_score')->avg();
    		$total_score['avg2']=$data->pluck('t2_score')->avg();
    		$total_score['avg3']=$data->pluck('t3_score')->avg();
    		$total_score['avg4']=$data->pluck('t4_score')->avg();
    		$total_score['avg5']=$data->pluck('t5_score')->avg();
    		$total_score['avg6']=$data->pluck('t6_score')->avg();
    		$total_score['avg7']=$data->pluck('t7_score')->avg();
    		$total_score['avg8']=$data->pluck('t8_score')->avg();
    		$total_score['avg9']=$data->pluck('t9_score')->avg();
   			$total_score['avg10']=$data->pluck('t10_score')->avg();
    		$total_score['avg11']=$data->pluck('t11_score')->avg();
    		$total_score['avg12']=$data->pluck('t12_score')->avg();
    		$total_score['avg13']=$data->pluck('t13_score')->avg();
    		$total_score['avg14']=$data->pluck('t14_score')->avg();
    		$total_score['avg15']=$data->pluck('t15_score')->avg();
    		$total_score['avg16']=$data->pluck('t16_score')->avg();
    		$total_score['avg17']=$data->pluck('t17_score')->avg();
    		$total_score['avg18']=$data->pluck('t18_score')->avg();
    		$total_score['avg19']=$data->pluck('t19_score')->avg();
    		$total_score['avg20']=$data->pluck('t20_score')->avg();

    		//get total ispleased
    		$pleased=$data->pluck('ispleased')->sum();
    		$pleased_percentage=intval($pleased/$ppnum*100);

    		//get total score >=60 percentage
    		$pleased_pp=$data->pluck('total_score')->filter(function($item){
    			return $item>=60;
    		})->count();
    		$pleased_pp_percentage=intval($pleased_pp/$ppnum*100);

    		//dd($pleased_pp_percentage);

    		return view('home.result',compact('ppnum','total_score','pleased_percentage','pleased_pp_percentage'));	
    	}
    	


    	
    }


    //show comments list
    public function comments()
    {
    	$comments=Comment::whereMonth('created_at','=',date('m'))->orderBy('id','desc')->paginate(10);
    	$comments_num=Comment::whereMonth('created_at','=',date('m'))->get()->count();
    	return view('home.comments',compact('comments','comments_num'));
    }

}
