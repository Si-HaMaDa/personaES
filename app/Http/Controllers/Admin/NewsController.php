<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\NewsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\News;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class NewsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(NewsDataTable $news)
            {
               return $news->render('admin.news.index',['title'=>trans('admin.news')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.news.create',['title'=>trans('admin.create')]);
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
             'subject'=>'required',
             'photo'=>''.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'subject'=>trans('admin.subject'),
             'photo'=>trans('admin.photo'),

              ]);
		
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','news');
              }
              News::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('news'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $news =  News::find($id);
                return view('admin.news.show',['title'=>trans('admin.show'),'news'=>$news]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $news =  News::find($id);
                return view('admin.news.edit',['title'=>trans('admin.edit'),'news'=>$news]);
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
             'subject'=>'required',
             'photo'=>''.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'subject'=>trans('admin.subject'),
             'photo'=>trans('admin.photo'),
                   ]);
               if(request()->hasFile('photo')){
              it()->delete(News::find($id)->photo);
              $data['photo'] = it()->upload('photo','news');
               }
              News::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('news'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $news = News::find($id);

               it()->delete($news->photo);
               it()->delete('news',$id);

               @$news->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$news = News::find($id);

                    	it()->delete($news->photo);
                    	it()->delete('news',$id);
                    	@$news->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $news = News::find($data);
 
                    	it()->delete($news->photo);
                    	it()->delete('news',$data);

                    @$news->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}