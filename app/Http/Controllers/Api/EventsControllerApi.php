<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Event;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class EventsControllerApi extends Controller
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
               "data"=>Event::orderBy('id','desc')->paginate(15)
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
                         'title'=>'required|string',
             'des'=>'required',
             'date'=>'required|date|date_format:d-m-Y|after:today',
             'time'=>'required',
             'img'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'title'=>trans('admin.title'),
             'des'=>trans('admin.des'),
             'date'=>trans('admin.date'),
             'time'=>trans('admin.time'),
             'img'=>trans('admin.img'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('img')){
              $data['img'] = it()->upload('img','events');
              }
        $create = Event::create($data); 

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
                $show =  Event::find($id);
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
             'title'=>'required|string',
             'des'=>'required',
             'date'=>'required|date|date_format:d-m-Y|after:today',
             'time'=>'required',
             'img'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'title'=>trans('admin.title'),
             'des'=>trans('admin.des'),
             'date'=>trans('admin.date'),
             'time'=>trans('admin.time'),
             'img'=>trans('admin.img'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('img')){
              it()->delete(Event::find($id)->img);
              $data['img'] = it()->upload('img','events');
               }
              Event::where('id',$id)->update($data);

              $Event = Event::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Event
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
               $events = Event::find($id);

               it()->delete($events->img);
               it()->delete('event',$id);

               @$events->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$events = Event::find($id);

                    	it()->delete($events->img);
                    	it()->delete('event',$id);
                    	@$events->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $events = Event::find($data);
 
                    	it()->delete($events->img);
                    	it()->delete('event',$data);

                    @$events->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}