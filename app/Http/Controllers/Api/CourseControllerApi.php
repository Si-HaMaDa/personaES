<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Course;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class CourseControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Course::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'titel'=>'required',
             'des'=>'required',
             'price'=>'required|numeric',
             'sessions'=>'required|numeric',
             'duration_num'=>'required|numeric',
             'duration_dis'=>'required',
             'strat_at'=>'date|date_format:Y-m-d h:i:s|after:today',
             'attends'=>'required|numeric',
             'time'=>'required',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'titel'=>trans('admin.titel'),
             'des'=>trans('admin.des'),
             'price'=>trans('admin.price'),
             'sessions'=>trans('admin.sessions'),
             'duration_num'=>trans('admin.duration_num'),
             'duration_dis'=>trans('admin.duration_dis'),
             'strat_at'=>trans('admin.strat_at'),
             'attends'=>trans('admin.attends'),
             'time'=>trans('admin.time'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
        $create = Course::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Course::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'titel'=>'required',
             'des'=>'required',
             'price'=>'required|numeric',
             'sessions'=>'required|numeric',
             'duration_num'=>'required|numeric',
             'duration_dis'=>'required',
             'strat_at'=>'date|date_format:Y-m-d h:i:s|after:today',
             'attends'=>'required|numeric',
             'time'=>'required',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'des'=>trans('admin.des'),
             'price'=>trans('admin.price'),
             'sessions'=>trans('admin.sessions'),
             'duration_num'=>trans('admin.duration_num'),
             'duration_dis'=>trans('admin.duration_dis'),
             'strat_at'=>trans('admin.strat_at'),
             'attends'=>trans('admin.attends'),
             'time'=>trans('admin.time'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              Course::where('id',$id)->update($data);

              $Course = Course::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Course
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $course = Course::find($id);


               @$course->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$course = Course::find($id);

                    	@$course->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $course = Course::find($data);
 

                    @$course->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}