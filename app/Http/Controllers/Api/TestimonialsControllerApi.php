<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Testimonial;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class TestimonialsControllerApi extends Controller
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
               "data"=>Testimonial::orderBy('id','desc')->paginate(15)
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
                         'name'=>'required|string',
             'job'=>'required',
             'message'=>'required',
             'photo'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('admin.name'),
             'job'=>trans('admin.job'),
             'message'=>trans('admin.message'),
             'photo'=>trans('admin.photo'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','testimonials');
              }
        $create = Testimonial::create($data); 

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
                $show =  Testimonial::find($id);
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
             'name'=>'required|string',
             'job'=>'required',
             'message'=>'required',
             'photo'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('admin.name'),
             'job'=>trans('admin.job'),
             'message'=>trans('admin.message'),
             'photo'=>trans('admin.photo'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('photo')){
              it()->delete(Testimonial::find($id)->photo);
              $data['photo'] = it()->upload('photo','testimonials');
               }
              Testimonial::where('id',$id)->update($data);

              $Testimonial = Testimonial::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Testimonial
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
               $testimonials = Testimonial::find($id);

               it()->delete($testimonials->photo);
               it()->delete('testimonial',$id);

               @$testimonials->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$testimonials = Testimonial::find($id);

                    	it()->delete($testimonials->photo);
                    	it()->delete('testimonial',$id);
                    	@$testimonials->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $testimonials = Testimonial::find($data);
 
                    	it()->delete($testimonials->photo);
                    	it()->delete('testimonial',$data);

                    @$testimonials->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}