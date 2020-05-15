<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\TestimonialsDataTable;
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
class TestimonialsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(TestimonialsDataTable $testimonials)
            {
               return $testimonials->render('admin.testimonials.index',['title'=>trans('admin.testimonials')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.testimonials.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
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
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'job'=>trans('admin.job'),
             'message'=>trans('admin.message'),
             'photo'=>trans('admin.photo'),

              ]);
		
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','testimonials');
              }
              Testimonial::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('testimonials'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $testimonials =  Testimonial::find($id);
                return view('admin.testimonials.show',['title'=>trans('admin.show'),'testimonials'=>$testimonials]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $testimonials =  Testimonial::find($id);
                return view('admin.testimonials.edit',['title'=>trans('admin.edit'),'testimonials'=>$testimonials]);
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
             'name'=>'required|string',
             'job'=>'required',
             'message'=>'required',
             'photo'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'job'=>trans('admin.job'),
             'message'=>trans('admin.message'),
             'photo'=>trans('admin.photo'),
                   ]);
               if(request()->hasFile('photo')){
              it()->delete(Testimonial::find($id)->photo);
              $data['photo'] = it()->upload('photo','testimonials');
               }
              Testimonial::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('testimonials'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $testimonials = Testimonial::find($data);
 
                    	it()->delete($testimonials->photo);
                    	it()->delete('testimonial',$data);

                    @$testimonials->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}