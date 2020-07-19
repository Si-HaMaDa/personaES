<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ExpertsInDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\ExpertsIn;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ExpertsInController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ExpertsInDataTable $expertsin)
            {
               return $expertsin->render('admin.expertsin.index',['title'=>trans('admin.expertsin')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.expertsin.create',['title'=>trans('admin.create')]);
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
             'title'=>'required',
             'description'=>'sometimes|nullable',
             'photo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'description'=>trans('admin.description'),
             'photo'=>trans('admin.photo'),

              ]);
		
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','expertsin');
              }
              ExpertsIn::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('expertsin'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $expertsin =  ExpertsIn::find($id);
                return view('admin.expertsin.show',['title'=>trans('admin.show'),'expertsin'=>$expertsin]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $expertsin =  ExpertsIn::find($id);
                return view('admin.expertsin.edit',['title'=>trans('admin.edit'),'expertsin'=>$expertsin]);
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
             'description'=>'sometimes|nullable',
             'photo'=>'sometimes|nullable|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'description'=>trans('admin.description'),
             'photo'=>trans('admin.photo'),
                   ]);
               if(request()->hasFile('photo')){
              it()->delete(ExpertsIn::find($id)->photo);
              $data['photo'] = it()->upload('photo','expertsin');
               }
              ExpertsIn::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('expertsin'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $expertsin = ExpertsIn::find($id);

               it()->delete($expertsin->photo);
               it()->delete('expertsin',$id);

               @$expertsin->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$expertsin = ExpertsIn::find($id);

                    	it()->delete($expertsin->photo);
                    	it()->delete('expertsin',$id);
                    	@$expertsin->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $expertsin = ExpertsIn::find($data);
 
                    	it()->delete($expertsin->photo);
                    	it()->delete('expertsin',$data);

                    @$expertsin->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}