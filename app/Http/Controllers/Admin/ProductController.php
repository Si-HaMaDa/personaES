<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ProductDataTable;
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
class ProductController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ProductDataTable $product)
            {
               return $product->render('admin.product.index',['title'=>trans('admin.product')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.product.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {
                // dd(it()->upload('img','product')['file_name']);
              $rules = [
             'title'=>'required',
             'img'=>'required|'.it()->image().'',
             'min_des'=>'required',
             'des'=>'required',
             'piece_price'=>'required|numeric',
             'category_id'=>'required',
             'pdf_files'=>'nullable|sometimes',
             'type'=>'required',
             'features_workplace_img'=>''.it()->image().'|nullable|sometimes',
             'features_workplace_des'=>'nullable|sometimes',
             'examine_memorable_pdf'=>'nullable|sometimes',
             'examine_memorable_des'=>'nullable|sometimes',
             
                   ];
              $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'img'=>trans('admin.img'),
             'min_des'=>trans('admin.min_des'),
             'des'=>trans('admin.des'),
             'piece_price'=>trans('admin.piece_price'),
             'category_id'=>trans('admin.category_id'),
             'type'=>trans('admin.type'),
             'pdf_files'=>trans('admin.pdf_files'),
             'features_workplace_img'=>trans('admin.features_workplace_img'),
             'features_workplace_des'=>trans('admin.features_workplace_des'),
             'examine_memorable_pdf'=>trans('admin.examine_memorable_pdf'),
             'examine_memorable_des'=>trans('admin.examine_memorable_des'),

              ]);
              
               if(request()->hasFile('img')){
              $data['img'] = it()->upload('img','product')['full_path'];
              }
               if(request()->hasFile('features_workplace_img')){
              $data['features_workplace_img'] = it()->upload('features_workplace_img','product')['full_path'];
              }
               if(request()->hasFile('examine_memorable_pdf')){
                   $examine_memorable_pdf = it()->upload('examine_memorable_pdf','product');
                $data['examine_memorable_pdf'] = [];
                $data['examine_memorable_pdf']['url'] = $examine_memorable_pdf['full_path'];
                $data['examine_memorable_pdf']['name']= $examine_memorable_pdf['file_name'];
                $data['examine_memorable_pdf'] = json_encode($data['examine_memorable_pdf']);
                
              }
              if(request()->hasFile('pdf_files')){
                $pdf_files = [];
                  foreach ($data['pdf_files'] as $key => $file) {
                      $files = it()->upload($file,'product');
                      $pdf_files[$key]['url'] = $files['full_path'];
                      $pdf_files[$key]['name'] = $files['file_name'];
                  }
                $data['pdf_files'] = json_encode($pdf_files);
            }

              
            //   dd($data);
              Product::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('product'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $product =  Product::find($id);
                return view('admin.product.show',['title'=>trans('admin.show'),'product'=>$product]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $product =  Product::find($id);
                return view('admin.product.edit',['title'=>trans('admin.edit'),'product'=>$product]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'title'=>'required',
             'img'=>'nullable|sometimes|'.it()->image().'',
             'min_des'=>'required',
             'des'=>'required',
             'piece_price'=>'required|numeric',
             'category_id'=>'required',
             'type'=>'required',
             'pdf_files'=>'nullable|sometimes',
             'pdf_files_old'=>'nullable|sometimes',
             'features_workplace_img'=>''.it()->image().'|nullable|sometimes',
             'features_workplace_des'=>'nullable|sometimes',
             'examine_memorable_pdf'=>'nullable|sometimes',
             'examine_memorable_des'=>'nullable|sometimes',


            ];
             $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'img'=>trans('admin.img'),
             'min_des'=>trans('admin.min_des'),
             'des'=>trans('admin.des'),
             'piece_price'=>trans('admin.piece_price'),
             'category_id'=>trans('admin.category_id'),
             'type'=>trans('admin.type'),
             'pdf_files'=>trans('admin.pdf_files'),
             'features_workplace_img'=>trans('admin.features_workplace_img'),
             'features_workplace_des'=>trans('admin.features_workplace_des'),
             'examine_memorable_pdf'=>trans('admin.examine_memorable_pdf'),
             'examine_memorable_des'=>trans('admin.examine_memorable_des'),
                   ]);
               if(request()->hasFile('img')){
              it()->delete(Product::find($id)->img);
              $data['img'] = it()->upload('img','product')['full_path'];
               }
               if(request()->hasFile('features_workplace_img')){
              it()->delete(Product::find($id)->features_workplace_img);
              $data['features_workplace_img'] = it()->upload('features_workplace_img','product')['full_path'];
               }
               if(request()->hasFile('examine_memorable_pdf')){
              it()->delete(Product::find($id)->examine_memorable_pdf);
                $data['examine_memorable_pdf'] = it()->upload('examine_memorable_pdf','product')['full_path'];
               }
                if(isset($data['pdf_files_old']))
                {
                    $pdf_files = $data['pdf_files_old'];
                }else{
                    $pdf_files = [];
                } ;
               if(request()->hasFile('pdf_files')){
                  foreach ($data['pdf_files'] as $key => $file) {
                      $files = it()->upload($file,'product');
                      $pdf_files[$key]['url'] = $files['full_path'];
                      $pdf_files[$key]['name'] = $files['file_name'];
                    }
                    $data['pdf_files'] = json_encode($pdf_files);
                }

                unset($data['pdf_files_old']);

              Product::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('product'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $product = Product::find($data);
 
                    	it()->delete($product->img);
                    	it()->delete('product',$data);
                    	it()->delete($product->features_workplace_img);
                    	it()->delete('product',$data);
                    	it()->delete($product->examine_memorable_pdf);
                    	it()->delete('product',$data);

                    @$product->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}