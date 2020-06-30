<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\FreeLessonDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\FreeLesson;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class FreeLessonController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(FreeLessonDataTable $freelesson)
            {
               return $freelesson->render('admin.freelesson.index',['title'=>trans('admin.freelesson')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.freelesson.create',['title'=>trans('admin.create')]);
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
             'titel'=>'required',
             'v_url'=>'required|url',
             'des'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'v_url'=>trans('admin.v_url'),
             'des'=>trans('admin.des'),

              ]);
		
              FreeLesson::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('freelesson'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $freelesson =  FreeLesson::find($id);
                return view('admin.freelesson.show',['title'=>trans('admin.show'),'freelesson'=>$freelesson]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $freelesson =  FreeLesson::find($id);
                return view('admin.freelesson.edit',['title'=>trans('admin.edit'),'freelesson'=>$freelesson]);
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
             'titel'=>'required',
             'v_url'=>'required|url',
             'des'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'v_url'=>trans('admin.v_url'),
             'des'=>trans('admin.des'),
                   ]);
              FreeLesson::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('freelesson'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $freelesson = FreeLesson::find($id);


               @$freelesson->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$freelesson = FreeLesson::find($id);

                    	@$freelesson->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $freelesson = FreeLesson::find($data);
 

                    @$freelesson->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}