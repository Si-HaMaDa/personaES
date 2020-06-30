<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Product;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ProductControllerApi extends Controller
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
               "data"=>Product::orderBy('id','desc')->paginate(15)
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
                         'title'=>'required',
             'img'=>'required|'.it()->image().'',
             'min_des'=>'required',
             'des'=>'required',
             'piece_price'=>'required|numeric',
             'category_id'=>'required',
             'features_workplace_img'=>''.it()->image().'|nullable|sometimes',
             'features_workplace_des'=>'nullable|sometimes',
             'examine_memorable_pdf'=>'nullable|sometimes',
             'examine_memorable_des'=>'nullable|sometimes',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'title'=>trans('admin.title'),
             'img'=>trans('admin.img'),
             'min_des'=>trans('admin.min_des'),
             'des'=>trans('admin.des'),
             'piece_price'=>trans('admin.piece_price'),
             'category_id'=>trans('admin.category_id'),
             'features_workplace_img'=>trans('admin.features_workplace_img'),
             'features_workplace_des'=>trans('admin.features_workplace_des'),
             'examine_memorable_pdf'=>trans('admin.examine_memorable_pdf'),
             'examine_memorable_des'=>trans('admin.examine_memorable_des'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('img')){
              $data['img'] = it()->upload('img','product');
              }
               if(request()->hasFile('features_workplace_img')){
              $data['features_workplace_img'] = it()->upload('features_workplace_img','product');
              }
               if(request()->hasFile('examine_memorable_pdf')){
              $data['examine_memorable_pdf'] = it()->upload('examine_memorable_pdf','product');
              }
        $create = Product::create($data); 

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
                $show =  Product::find($id);
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
             'title'=>'required',
             'img'=>'required|'.it()->image().'',
             'min_des'=>'required',
             'des'=>'required',
             'piece_price'=>'required|numeric',
             'category_id'=>'required',
             'features_workplace_img'=>''.it()->image().'|nullable|sometimes',
             'features_workplace_des'=>'nullable|sometimes',
             'examine_memorable_pdf'=>'nullable|sometimes',
             'examine_memorable_des'=>'nullable|sometimes',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'title'=>trans('admin.title'),
             'img'=>trans('admin.img'),
             'min_des'=>trans('admin.min_des'),
             'des'=>trans('admin.des'),
             'piece_price'=>trans('admin.piece_price'),
             'category_id'=>trans('admin.category_id'),
             'features_workplace_img'=>trans('admin.features_workplace_img'),
             'features_workplace_des'=>trans('admin.features_workplace_des'),
             'examine_memorable_pdf'=>trans('admin.examine_memorable_pdf'),
             'examine_memorable_des'=>trans('admin.examine_memorable_des'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('img')){
              it()->delete(Product::find($id)->img);
              $data['img'] = it()->upload('img','product');
               }
               if(request()->hasFile('features_workplace_img')){
              it()->delete(Product::find($id)->features_workplace_img);
              $data['features_workplace_img'] = it()->upload('features_workplace_img','product');
               }
               if(request()->hasFile('examine_memorable_pdf')){
              it()->delete(Product::find($id)->examine_memorable_pdf);
              $data['examine_memorable_pdf'] = it()->upload('examine_memorable_pdf','product');
               }
              Product::where('id',$id)->update($data);

              $Product = Product::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Product
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
               $product = Product::find($id);

               it()->delete($product->img);
               it()->delete('product',$id);
               it()->delete($product->features_workplace_img);
               it()->delete('product',$id);
               it()->delete($product->examine_memorable_pdf);
               it()->delete('product',$id);

               @$product->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$product = Product::find($id);

                    	it()->delete($product->img);
                    	it()->delete('product',$id);
                    	it()->delete($product->features_workplace_img);
                    	it()->delete('product',$id);
                    	it()->delete($product->examine_memorable_pdf);
                    	it()->delete('product',$id);
                    	@$product->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $product = Product::find($data);
 
                    	it()->delete($product->img);
                    	it()->delete('product',$data);
                    	it()->delete($product->features_workplace_img);
                    	it()->delete('product',$data);
                    	it()->delete($product->examine_memorable_pdf);
                    	it()->delete('product',$data);

                    @$product->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}