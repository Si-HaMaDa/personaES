@extends('admin.index')
@section('content')

		 <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
              <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('course/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.course')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.course')}}">

                        <a data-toggle="modal" data-target="#myModal{{$course->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$course->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$course->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['course.destroy', $course->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/course')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.course')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
            <div class="portlet-body form">
				<div class="col-md-12">
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$course->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.titel')}} :</b>
 {!! $course->titel !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.des')}} :</b>
 {!! $course->des !!}
</div>


<a class="dt-button btn btn-primary" tabindex="0" href="{{aurl('/course/'.$course->id."/groups")}}" aria-controls="dataTableBuilder"><span><i class="fa fa-plus"></i> Add Group</span></a>

        <div class="col-md-12 col-lg-12 col-xs-12">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>{{trans('admin.price')}}</th>
                        <th>{{trans('admin.sessions')}}</th>
                        <th>{{trans('admin.duration_num')}}</th>
                        <th>{{trans('admin.duration_dis')}}</th>
                        <th>{{trans('admin.strat_at')}}</th>
                        <th>{{trans('admin.attends')}}</th>
                        <th>{{trans('admin.time')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($course->Groups as $Group)
                            <tr>
                                <th scope="row">{{$Group->price}}</th>
                                <th scope="row">{{$Group->sessions}}</th>
                                <th scope="row">{{$Group->duration_num}}</th>
                                <th scope="row">{{$Group->duration_dis}}</th>
                                <th scope="row">{{$Group->strat_at}}</th>
                                <th scope="row">{{$Group->attends}}</th>
                                <th scope="row">{{$Group->time}}</th>
                            </tr>
                            <tr>
                            {!! Form::open(['url'=>aurl('/groups/send/'.$Group->id),'method'=>'post','id'=>'course','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                                <td scope="row" colspan="6">
                                    <div class="form-group">
                                        {!! Form::label('massege',trans('admin.massege'),['class'=>'col-md-3 control-label']) !!}
                                        <div class="col-md-9">
                                            {!! Form::textarea('massege', null ,['class'=>'form-control basic-ckeditor','placeholder'=>trans('admin.massege')]) !!}
                                        </div>
                                    </div>    
                                </td>
                                <td scope="row">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                    {!! Form::submit(trans('admin.send'),['class'=>'btn btn-success']) !!}
                                             </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            {!! Form::close() !!}
                            </tr>




                            <thead class="thead-inverse">
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>city</th>
                                    <th>country</th>
                                    <th>address</th>
                                    <th>created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Group->Clients as $Client)
                                    <tr>
                                        <td scope="row">{{$Client->name}}</td>
                                        <td scope="row">{{$Client->email}}</td>
                                        <td scope="row">{{$Client->phone}}</td>
                                        <td scope="row">{{$Client->city}}</td>
                                        <td scope="row">{{$Client->country}}</td>
                                        <td scope="row">{{$Client->address}}</td>
                                        <td scope="row">{{$Client->created_at}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td rowspan="7">No Clients</td>
                                        
                                    </tr>
                                    @endforelse
                                </tbody>
                        @empty
                        <tr>
                            <td rowspan="7">No Groups</td>
                        </tr>
                        @endforelse
                    
            
                    </tbody>
            </table>
        </div>

{{-- 
            <div class="col-md-12 col-lg-12 col-xs-12">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>city</th>
                            <th>country</th>
                            <th>address</th>
                            <th>created at</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($course->Clients as $Client)
                            <tr>
                                <td scope="row">{{$Client->name}}</td>
                                <td scope="row">{{$Client->email}}</td>
                                <td scope="row">{{$Client->phone}}</td>
                                <td scope="row">{{$Client->city}}</td>
                                <td scope="row">{{$Client->country}}</td>
                                <td scope="row">{{$Client->address}}</td>
                                <td scope="row">{{$Client->created_at}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td rowspan="7">No Clients</td>
                                
                            </tr>
                            @endforelse
                        
                
                        </tbody>
                </table>
            </div> --}}


			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
   
   @push('js')
   <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
   <script>
   CKEDITOR.replaceClass = 'basic-ckeditor';
   </script>
   @endpush
@stop