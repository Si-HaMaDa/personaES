<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\OurClientsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\OurClient;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class OurClientsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(OurClientsDataTable $ourclients)
            {
               return $ourclients->render('admin.ourclients.index',['title'=>trans('admin.ourclients')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.ourclients.create',['title'=>trans('admin.create')]);
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
             'logo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),

              ]);
		
               if(request()->hasFile('logo')){
              $data['logo'] = it()->upload('logo','ourclients');
              }
              OurClient::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('ourclients'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $ourclients =  OurClient::find($id);
                return view('admin.ourclients.show',['title'=>trans('admin.show'),'ourclients'=>$ourclients]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $ourclients =  OurClient::find($id);
                return view('admin.ourclients.edit',['title'=>trans('admin.edit'),'ourclients'=>$ourclients]);
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
             'logo'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),
                   ]);
               if(request()->hasFile('logo')){
              it()->delete(OurClient::find($id)->logo);
              $data['logo'] = it()->upload('logo','ourclients');
               }
              OurClient::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('ourclients'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $ourclients = OurClient::find($id);

               it()->delete($ourclients->logo);
               it()->delete('ourclient',$id);

               @$ourclients->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$ourclients = OurClient::find($id);

                    	it()->delete($ourclients->logo);
                    	it()->delete('ourclient',$id);
                    	@$ourclients->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $ourclients = OurClient::find($data);
 
                    	it()->delete($ourclients->logo);
                    	it()->delete('ourclient',$data);

                    @$ourclients->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}