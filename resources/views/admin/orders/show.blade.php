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

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/orders')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.orders')}}">
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
                    <b>{{trans('admin.id')}} :</b> {{$orders->id}}
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="col-md-4 col-lg-4 col-xs-4">
                    <b>{{trans('admin.name')}} :</b>
                    {!! $orders->name !!}
                    </div>

                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.email')}} :</b>
                        {!! $orders->email !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.phone')}} :</b>
                        {!! $orders->phone !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.city')}} :</b>
                        {!! $orders->city !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.country')}} :</b>
                        {!! $orders->country !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.address')}} :</b>
                        {!! $orders->address !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.type')}} :</b>
                        {!! $orders->type !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.pro_id')}} :</b>
                        {!! $orders->Product->title !!}
                    </div>

                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.pro_type')}} :</b>
                        {!! $orders->Product->type !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.price')}} :</b>
                        {!! $orders->price !!}
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4">
                        <b>{{trans('admin.count')}} :</b>
                        {!! $orders->count !!}
                    </div>
                    <br>
                    @if ($orders->link != null)
                        <div class="col-md-4 col-lg-4 col-xs-4">
                            <b>{{trans('admin.link')}} :</b>
                            {!! $orders->link !!}
                        </div>
                    @else
                        {!! Form::open(['url'=>aurl('/orders/'.$orders->id),'method'=>'put','id'=>'orders','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}

                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::text('link',old('link'),['class'=>'form-control','placeholder'=>trans('admin.link')]) !!}
                            </div>
                        </div>
                        <br>
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
                        {!! Form::close() !!}
                    @endif

			    </div>
			    <div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop