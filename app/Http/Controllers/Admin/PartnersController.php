<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PartnersDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Partner;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class PartnersController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PartnersDataTable $partners)
            {
               return $partners->render('admin.partners.index',['title'=>trans('admin.partners')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.partners.create',['title'=>trans('admin.create')]);
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
             'name'=>'required',
             'logo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),

              ]);
		
               if(request()->hasFile('logo')){
              $data['logo'] = it()->upload('logo','partners');
              }
              Partner::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('partners'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $partners =  Partner::find($id);
                return view('admin.partners.show',['title'=>trans('admin.show'),'partners'=>$partners]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $partners =  Partner::find($id);
                return view('admin.partners.edit',['title'=>trans('admin.edit'),'partners'=>$partners]);
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
             'name'=>'required',
             'logo'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),
                   ]);
               if(request()->hasFile('logo')){
              it()->delete(Partner::find($id)->logo);
              $data['logo'] = it()->upload('logo','partners');
               }
              Partner::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('partners'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $partners = Partner::find($id);

               it()->delete($partners->logo);
               it()->delete('partner',$id);

               @$partners->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$partners = Partner::find($id);

                    	it()->delete($partners->logo);
                    	it()->delete('partner',$id);
                    	@$partners->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $partners = Partner::find($data);
 
                    	it()->delete($partners->logo);
                    	it()->delete('partner',$data);

                    @$partners->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}