<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CourseDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Course;
use App\Model\CoursesGroup;
use App\Mail\SendMailCoursesByUser;
use Validator;
use Set;
use Mail;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class CourseController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CourseDataTable $course)
            {
               return $course->render('admin.course.index',['title'=>trans('admin.course')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.course.create',['title'=>trans('admin.create')]);
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
             'des'=>'required',
             'mini_des'=>'required',
             'price'=>'required|numeric',
             'sessions'=>'required|numeric',
             'duration_num'=>'required|numeric',
             'duration_dis'=>'required',
             'strat_at'=>'date|date_format:Y-m-d h:i:s|after:today',
             'attends'=>'required|numeric',
             'photo'=>''.it()->image().'',
             'time'=>'required',
             
                   ];
              $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'des'=>trans('admin.des'),
             'mini_des'=>trans('admin.mini_des'),
             'price'=>trans('admin.price'),
             'sessions'=>trans('admin.sessions'),
             'duration_num'=>trans('admin.duration_num'),
             'duration_dis'=>trans('admin.duration_dis'),
             'strat_at'=>trans('admin.strat_at'),
             'attends'=>trans('admin.attends'),
             'time'=>trans('admin.time'),
             'photo'=>trans('admin.photo'),

              ]);
        
              if(request()->hasFile('photo')){
                    $data['photo'] = it()->upload('photo','Course');
                }
            $Course = new Course;
            $Course->titel = $data['titel'];
            $Course->des = $data['des'];
            $Course->photo = $data['photo'];
            $Course->save();
            $Course->Groups()->createMany([
                [
                    'price' => $data['price'] ,
                    'sessions' => $data['sessions'] ,
                    'duration_num' => $data['duration_num'] ,
                    'duration_dis' => $data['duration_dis'] ,
                    'strat_at' => $data['strat_at'] ,
                    'attends' => $data['attends'] ,
                    'time' => $data['time'] 
                ],
            ]);
                session()->flash('success',trans('admin.added'));
                return redirect(aurl('course'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $course =  Course::with('Clients','Groups','Groups.Clients')->find($id);
                return view('admin.course.show',['title'=>trans('admin.show'),'course'=>$course]);
            }

            

                   /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function addGroups($id)
            {
                $course =  Course::find($id);
                return view('admin.course.add-groups',['title'=>trans('admin.add_groups'),'course'=>$course]);
            }


             /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function sendToGroups($id)
            {
                $rules = [
                    'massege'=>'required',
                ];
                $data = $this->validate(request(),$rules,[],[
                    'massege'=>trans('admin.massege'),
                ]);

                $CoursesGroup =  CoursesGroup::findOrFail($id);
                $Clients = $CoursesGroup->Clients;
                if($Clients->count() != 0){
                    foreach ($Clients as $key => $Client) {
                        # code...
                        $data = $Client->toArray() ;
                        $data['massege'] = request()->massege;
                        Mail::to($data['email'])->send(new SendMailCoursesByUser($data));
                    }
                }
                session()->flash('success',trans('admin.sended'));
                return redirect(aurl('/course/'.$id));
            }


            
          /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function insertGroups($id)
            {
                $rules = [
                    'price'=>'required|numeric',
                    'sessions'=>'required|numeric',
                    'duration_num'=>'required|numeric',
                    'duration_dis'=>'required',
                    'strat_at'=>'date|date_format:Y-m-d h:i:s|after:today',
                    'attends'=>'required|numeric',
                    'time'=>'required',
                ];
                $data = $this->validate(request(),$rules,[],[
                    'price'=>trans('admin.price'),
                    'sessions'=>trans('admin.sessions'),
                    'duration_num'=>trans('admin.duration_num'),
                    'duration_dis'=>trans('admin.duration_dis'),
                    'strat_at'=>trans('admin.strat_at'),
                    'attends'=>trans('admin.attends'),
                    'time'=>trans('admin.time'),
                ]);
                $Course =  Course::find($id);
                $Course->Groups()->createMany([
                    [
                        'price' => $data['price'] ,
                        'sessions' => $data['sessions'] ,
                        'duration_num' => $data['duration_num'] ,
                        'duration_dis' => $data['duration_dis'] ,
                        'strat_at' => $data['strat_at'] ,
                        'attends' => $data['attends'] ,
                        'time' => $data['time'] 
                    ],
                ]);
                session()->flash('success',trans('admin.added'));
                return redirect(aurl('/course/'.$id));
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $course =  Course::find($id);
                return view('admin.course.edit',['title'=>trans('admin.edit'),'course'=>$course]);
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
             'des'=>'required',
             'mini_des'=>'required',
            'photo'=>''.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'titel'=>trans('admin.titel'),
             'des'=>trans('admin.des'),
             'mini_des'=>trans('admin.mini_des'),

            'photo'=>trans('admin.photo'),
                   ]);

            if(request()->hasFile('photo')){
                it()->delete(Course::find($id)->photo);
                $data['photo'] = it()->upload('photo','Course');
            }


              Course::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('course'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $course = Course::find($id);


               @$course->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$course = Course::find($id);
                    	@$course->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $course = Course::find($data);
                    @$course->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}