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
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.course')}}">
												<i class="fa fa-plus"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('course')}}"
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
										
{!! Form::open(['url'=>aurl('/course/'.$course->id."/groups"),'method'=>'post','id'=>'course','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="col-md-6">
	<div class="form-group">
		{!! Form::label('price',trans('admin.price'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
				{!! Form::number('price',null,['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
		</div>
		</div>
	</div>
		<div class="col-md-6">
		<div class="form-group">
		{!! Form::label('sessions',trans('admin.sessions'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
				{!! Form::number('sessions',null,['class'=>'form-control','placeholder'=>trans('admin.sessions')]) !!}
		</div>
		</div>
	</div>
		<br>
		<div class="col-md-6">
		
		<div class="form-group">
		{!! Form::label('duration_num',trans('admin.duration_num'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
				{!! Form::number('duration_num',null,['class'=>'form-control','placeholder'=>trans('admin.duration_num')]) !!}
		</div>
		</div>
	</div>
	
		<div class="col-md-6">
	
		<div class="form-group">
			{!! Form::label('duration_dis',trans('admin.duration_dis'),['class'=>'col-md-3 control-label']) !!}
			<div class="col-md-9">
	{!! Form::select('duration_dis',['week'=>trans('admin.week'),'day'=>trans('admin.day')],null,['class'=>'form-control']) !!}
			</div>
	</div>
	</div>
	<br>
		
		<div class="form-group">
		{!! Form::label('attends',trans('admin.attends'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
				{!! Form::number('attends',null,['class'=>'form-control','placeholder'=>trans('admin.attends')]) !!}
		</div>
		</div>
		<br>
	
		<div class="form-group">
			{!! Form::label('strat_at',trans('admin.strat_at'),['class'=>'col-md-3 control-label']) !!}
			<div class="col-md-9">
					{!! Form::text('strat_at',null,['class'=>'form-control date-time','placeholder'=>trans('admin.strat_at'),'readonly'=>'readonly','data-date'=>date("Y-m-d HH:ii:ss"),'data-date-format'=>'yyyy-mm-dd HH:ii:ss']) !!}
			</div>
	</div>
	<br>
<div class="form-group">
    {!! Form::label('time',trans('admin.time'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('time', null ,['class'=>'form-control','placeholder'=>trans('admin.time')]) !!}
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
         </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

												</div>
												<div class="clearfix"></div>
								</div>
						</div>
				</div>
		</div>
		@stop
		
